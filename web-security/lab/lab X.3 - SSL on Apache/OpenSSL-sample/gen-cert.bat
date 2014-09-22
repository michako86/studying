openssl genrsa -des3 -passout pass:1234 -out server.key.org 1024
openssl req -new -passin pass:1234 -passout pass:1234 -key server.key.org -out server.csr -days 3650
openssl req -x509 -passin pass:1234 -passout pass:1234 -key server.key.org -in server.csr -out server.crt -days 3650
openssl rsa -passin pass:1234 -in server.key.org -out server.key

copy server.key "C:\Program Files\Apache Software Foundation\Apache2.2\conf\"
copy server.crt "C:\Program Files\Apache Software Foundation\Apache2.2\conf\"