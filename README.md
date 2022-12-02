# DoAnCNTT
Nhóm: Đàm Vinh Quang
Đề tài: Xây dựng ứng dụng bán thức ăn trực tuyến
# Công nghệ sử dụng:
Front-end: HTML, Css, BootStrap
Back-end: PhP
# Phần mềm sử dụng:
visual studio code
phần mềm xampp 
git Bash
# Hướng dẫn sử dụng:
Bước 1: Đầu tiên ta vào thư mục xampp/htdocs sau đó Open Git Bash Here:

Bước 2: Sau đó gõ lệnh: git clone https://github.com/DamVinhQuang/DoAnCNTT và nhấn Enter, folder đồ án sẽ được git vào trong htdocs

Bước 3: Khởi động xampp lên, sau đó start Apache và start MySQL.

Bước 4: Truy cập database tại phpMyAdmin, tạo 1 database tên là webmin và chọn utf8_general_ci.

Bước 5: Vào database vừa tạo, nhấn import. Trong mục File to import chọn Choose File, sau đó chọn đến thư mục theo đường dẫn xampp/htdocs/DoAnCNTT, sau đó chọn file webmin.sql và nhấn import.

Bước 7: Cấu hình tại xampp/htdocs/DoAnCNTT/config.php và xampp/htdocs/DoAnCNTT/admin/config.php

DB_NAME: 'webmin'
DB_USER: 'root'
DB_PASSWORD: ''
DB_HOST: 'localhost'
PORT: 4306
Bước 9: Mở browser lên nhập localhost/DoAnCNTT để chạy đồ án.
Tài khoản để đăng nhập:
username: admin, pass: 123 là tài khoản admin để vào trang admin quản trị
username: user123, pass: 123 là tài khoản khách hàng.
Cảm ơn Thầy Cô và các bạn đã xem
