<?php

require 'INewsDB.class.php';

class NewsDB implements INewsDB {

    protected $_db;
	//C:\Users\Public\WebServer\apache\htdocs\php-l3\news
    const DB_NAME = 'C:\Users\Public\WebServer\apache\htdocs\php-l3\news.db';
    //const DB_NAME = "news.db";

    const RSS_NAME = "rss.xml";
    const RSS_TITLE = "Новостная лента";
    const RSS_LINK = "http://localhost/php-l3/news/news.php";

    function __construct() {
        if (is_file(self::DB_NAME)) {
            $this->_db = new SQLite3(self::DB_NAME);
        } else {
            $this->_db = new SQLite3(self::DB_NAME);

            $sql = "CREATE TABLE msgs(
                            id INTEGER PRIMARY KEY AUTOINCREMENT,
                            title TEXT,
                            category INTEGER,
                            description TEXT,
                            source TEXT,
                            datetime INTEGER)";

            $this->_db->exec($sql) or die($this->_db->lastErrorMsg());

            $sql = "CREATE TABLE category(
                            id INTEGER,
                            name TEXT)";

            $this->_db->exec($sql) or die($this->_db->lastErrorMsg());

            $sql = "INSERT INTO category(id, name)
                    SELECT 1 as id, 'Политика' as name
                    UNION SELECT 2 as id, 'Культура' as name
                    UNION SELECT 3 as id, 'Спорт' as name ";

            $this->_db->exec($sql) or die($this->_db->lastErrorMsg());
        }
    }

    function __destruct() {
        unset($this->_db);
    }

    public function deleteNews($id) {

        try {
            $sql = "DELETE FROM msgs WHERE id=$id";
            $result = $this->_db->exec($sql);

            if (!$result) {
                throw new Exception($this->_db->lastErrorMsg());
            }
            return true;
        } catch (Exception $ex) {
            //$ex->getMessage();
            return FALSE;
        }
    }

    protected function db2Arr($data) {
        $arr = array();

        while ($row = $data->fetchArray(SQLITE3_ASSOC)) {
            $arr[] = $row;
        }

        return $arr;
    }

    public function getNews() {

        try {

            $sql = "SELECT msgs.id as id, title, category.name as category, description, source, datetime
              FROM msgs, category       
              WHERE category.id=msgs.category
              ORDER BY msgs.id DESC
             ";

            $res = $this->_db->query($sql);

            if (!is_object($res)) {
                throw new Exception($this->_db->lastErrorMsg());
            }

            return $this->db2Arr($res);
        } catch (Exception $ex) {
            return false;
        }
    }

    public function saveNews($title, $category, $description, $source) {
        try {

            $dt = time();
            $sql = "INSERT INTO msgs(title,category,description, source, datetime)
                       VALUES('$title', '$category', '$description', '$source', '$dt')";


            $res = $this->_db->exec($sql);

            if (!$res) {
                throw new Exception($this->_db->lastErrorMsg());
            }
            
            $this->createRss();

            return TRUE;
        } catch (Exception $ex) {
            return false;
        }
    }

    public function claerStr($data) {
        $data = trim(strip_tags($data));
        return $this->_db->escapeString($data);
    }

    public function claerInt($data) {
        return abs((int) $data);
    }

    public function createRss() {
        $dom = new DOMDocument('1.0', 'utf-8');
        $dom->formatOutput = true;
        $dom->preserveWhiteSpace = false;

        $rss = $dom->createElement("rss");
        
        $version = $dom->createAttribute("version");
        $version->value = "2.0";
        $rss->appendChild($version);
        
        $dom->appendChild($rss);

        $channel = $dom->createElement("channel");
        $rss->appendChild($channel);
        $title = $dom->createElement("title", self::RSS_TITLE);

        $link = $dom->createElement("title", self::RSS_LINK);

        $channel->appendChild($title);
        $channel->appendChild($link);

        $lenta = $this->getNews();

        if (!$lenta)
            return FALSE;

        foreach ($lenta as $news) {
           $item = $dom->createElement("item"); 
           $title = $dom->createElement("title" , $news['title']); 
           $category = $dom->createElement("category" , $news['category']);
           $description = $dom->createElement("description" , $news['description']);
           
           $txt = self::RSS_LINK."?id=".$news['id'];
           $link = $dom->createElement("link" , $txt);
           
           $dt = date('r', $news['datetime']);
           $pubDate = $dom->createElement("pubDate" , $dt);
           
           $item->appendChild($title);
           $item->appendChild($link);
           $item->appendChild($description);
           $item->appendChild($pubDate);
           $item->appendChild($category);
           
           $channel->appendChild($item);
        }
        
        $dom->save(self::RSS_NAME);
        
    }

}

