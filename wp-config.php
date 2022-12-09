<?php
/**
 * Cấu hình cơ bản cho WordPress
 *
 * Trong quá trình cài đặt, file "wp-config.php" sẽ được tạo dựa trên nội dung 
 * mẫu của file này. Bạn không bắt buộc phải sử dụng giao diện web để cài đặt, 
 * chỉ cần lưu file này lại với tên "wp-config.php" và điền các thông tin cần thiết.
 *
 * File này chứa các thiết lập sau:
 *
 * * Thiết lập MySQL
 * * Các khóa bí mật
 * * Tiền tố cho các bảng database
 * * ABSPATH
 *
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */

// ** Thiết lập MySQL - Bạn có thể lấy các thông tin này từ host/server ** //
/** Tên database MySQL */
define( 'DB_NAME', 'muncf' );

/** Username của database */
define( 'DB_USER', 'root' );

/** Mật khẩu của database */
define( 'DB_PASSWORD', '' );

/** Hostname của database */
define( 'DB_HOST', 'localhost' );

/** Database charset sử dụng để tạo bảng database. */
define( 'DB_CHARSET', 'utf8mb4' );

/** Kiểu database collate. Đừng thay đổi nếu không hiểu rõ. */
define('DB_COLLATE', '');

/**#@+
 * Khóa xác thực và salt.
 *
 * Thay đổi các giá trị dưới đây thành các khóa không trùng nhau!
 * Bạn có thể tạo ra các khóa này bằng công cụ
 * {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * Bạn có thể thay đổi chúng bất cứ lúc nào để vô hiệu hóa tất cả
 * các cookie hiện có. Điều này sẽ buộc tất cả người dùng phải đăng nhập lại.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         '}Cd|i`01!6;!g3&a,6JYZNiMqNFa:C.u,5lzVB5MHDs(pI4>m3N8-Kdg{B4@IiGI' );
define( 'SECURE_AUTH_KEY',  '#uO`%.t0^u{|__+bazb0*3|jrV|zEBH*&358YFyQzBk&ZO5J+~P#3}1v|[2+8Ai$' );
define( 'LOGGED_IN_KEY',    '0PVC~+`kH,W;hM4vGRI5*OtJewASlHv3>E4-I=>fwH%Q~i+*:;#l5vDQ>]N2tg<A' );
define( 'NONCE_KEY',        '=a`(@/}@9WD~|-{n9^*_Mcn;$i&Bi~gQ(9]DjA+2X:Xx8^^]U5Md&#2]GkD9XP~^' );
define( 'AUTH_SALT',        '-nCu=![EuU(aSqO3FJB.c-{8Nk;5s*1lF)b`*cm)Tao5Wi>]<-WI4n7*Z>TZZu9[' );
define( 'SECURE_AUTH_SALT', 'vSTx*qYKC]|V!auQJ8_ePxJQ3;W7wDcO4(prdfuirznjD7fn{wxn;OxP,wz`j<3^' );
define( 'LOGGED_IN_SALT',   'X?{WG+qp9S.[TcSQl/;U&&_?j,%`Nv1*aoA6) PWgO%?/KX=uqt*]Q^wO l4Gxzc' );
define( 'NONCE_SALT',       'M1b1R)~spI|_D@)_YQHd_:^0>dN)L>Q}-Yum5oBh0,Ko<w%uMT>#CU%kf_u*I@k-' );

/**#@-*/

/**
 * Tiền tố cho bảng database.
 *
 * Đặt tiền tố cho bảng giúp bạn có thể cài nhiều site WordPress vào cùng một database.
 * Chỉ sử dụng số, ký tự và dấu gạch dưới!
 */
$table_prefix = 'wp_';

/**
 * Dành cho developer: Chế độ debug.
 *
 * Thay đổi hằng số này thành true sẽ làm hiện lên các thông báo trong quá trình phát triển.
 * Chúng tôi khuyến cáo các developer sử dụng WP_DEBUG trong quá trình phát triển plugin và theme.
 *
 * Để có thông tin về các hằng số khác có thể sử dụng khi debug, hãy xem tại Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define('WP_DEBUG', false);

/* Đó là tất cả thiết lập, ngưng sửa từ phần này trở xuống. Chúc bạn viết blog vui vẻ. */

/** Đường dẫn tuyệt đối đến thư mục cài đặt WordPress. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Thiết lập biến và include file. */
require_once(ABSPATH . 'wp-settings.php');
