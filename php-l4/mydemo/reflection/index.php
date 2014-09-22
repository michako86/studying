<?php
header('Content-Type: text/html; charset=utf-8');

include './plugins.php';

function findPlugins() {
    $plugins = array();

    foreach (get_declared_classes() as $class) {

        $rClass = new ReflectionClass($class);

        if ($rClass->implementsInterface("IPlugin")) {
            $plugins[] = $rClass;
        }
    }
    return $plugins;
}

function computeMenu() {
    $list = array();
    
    foreach (findPlugins() as $plugin) {
        if($plugin->hasMethod("getMenuItems")) {
            
            $m = $plugin->getMethod("getMenuItems");
            
            if($m->isStatic()) {
                $item = $m->invoke(null);
            } else {
                $obj = $plugin->newInstance();
                $item = $m->invoke($obj);
            }
        }
        
        $list[] = $item;
    }
    return $list;
}

$menu = computeMenu();
print_r($menu);

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

