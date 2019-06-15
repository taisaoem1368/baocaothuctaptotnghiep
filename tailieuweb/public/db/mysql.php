<?php 
require_once('public/db/config.php');
// phpinfo();
Class mysql_db {
	public static $conn;

	public function __construct() {
		self::$conn = mysql_connect('localhost', 'root', '');
		mysql_select_db('tailieuweb', self::$conn);
		mysql_set_charset('UTF-8', self::$conn);
	}

	public function __destruct() {
		self::$conn->mysql_close();
	}

	public function getDataMotos()
	{
		return mysql_query("SELECT * FROM motos", self::$conn) or die(mysql_error(self::$conn));
	}
}
/*
Phần mở rộng MySQL:

Không được phát triển tích cực
Được chính thức từ chối kể từ phiên bản PHP 5.5 (phát hành tháng 6 năm 2013).
Đã bị xóa hoàn toàn kể từ PHP 7.0 (phát hành tháng 12 năm 2015)
Điều này có nghĩa là kể từ ngày 31 tháng 12 năm 2018, nó sẽ không tồn tại trong bất kỳ phiên bản PHP được hỗ trợ nào. Hiện tại, nó chỉ được cập nhật bảo mật .
Thiếu giao diện
Không hỗ trợ:
Các truy vấn không chặn, không đồng bộ
Báo cáo đã chuẩn bị hoặc truy vấn tham số
Thủ tục lưu trữ
Nhiều báo cáo
Giao dịch
Phương thức xác thực mật khẩu "mới" (theo mặc định trong MySQL 5.6; bắt buộc trong 5.7)
Tất cả các chức năng trong MySQL 5.1
Vì nó không được dùng nữa, việc sử dụng nó làm cho mã của bạn ít bằng chứng trong tương lai.

Thiếu hỗ trợ cho các câu lệnh được chuẩn bị đặc biệt quan trọng vì chúng cung cấp một phương thức thoát và trích dẫn dữ liệu bên ngoài rõ ràng hơn, ít lỗi hơn so với thoát thủ công bằng một lệnh gọi hàm riêng biệt.
Nguồn: https://stackoverflow.com/questions/12859942/why-shouldnt-i-use-mysql-functions-in-php
*/