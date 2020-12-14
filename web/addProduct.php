<!-- Câu 1: upload and insert -->
<?php
    include '../includes/connect.php';


  if(isset($_POST["submitAdd"])) {
    function postIndex($i, $v='')
  {
    return isset($_POST[$i])?$_POST[$i]:$v;
  }
  }
  $sm = postIndex('submit');
  $maxe =postIndex('txtMa');
  $tenxe =postIndex('txtName');	//tensach
  $mota =postIndex('txtDetail');
  $gia =postIndex('txtCost');


  // file upload.php xử lý upload file

  if ($_SERVER['REQUEST_METHOD'] !== 'POST')
  {
      // Dữ liệu gửi lên server không bằng phương thức post
      echo "Phải Post dữ liệu";
      die;
  }

  // Kiểm tra có dữ liệu fileupload trong $_FILES không
  // Nếu không có thì dừng
  if (!isset($_FILES["hinh"]))
  {
      echo "Dữ liệu không đúng cấu trúc";
      die;
  }

  // Kiểm tra dữ liệu có bị lỗi không
  if ($_FILES["hinh"]['error'] != 0)
  {
    echo "Dữ liệu upload bị lỗi <a href=".'index.php'.">Tiếp tục</a>";
    die;
  } 

  
  $hinh = isset($_FILES['hinh']['error'])?$_FILES['hinh']['name']:'';
  $arr = [
    postIndex('txtMa'),
    postIndex('txtName'),	//tensach
    postIndex('txtDetail'),
    postIndex('txtCost'), //gia
    $hinh,
    postIndex('maloai'),//maloai
    ];

  // Đã có dữ liệu upload, thực hiện xử lý file upload

  //Thư mục bạn sẽ lưu file upload
  $target_dir    = "images/pro_img/";
  
  //Vị trí file lưu tạm trong server (file sẽ lưu trong uploads, với tên giống tên ban đầu)
  $target_file   = $target_dir . basename($_FILES["hinh"]["name"]);

  $allowUpload   = true;

  //Lấy phần mở rộng của file (jpg, png, ...)
  $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);

  // Cỡ lớn nhất được upload (bytes)
  $maxfilesize   = 100000;

  ////Những loại file được phép upload
  $allowtypes    = array('jpg', 'png', 'jpeg', 'gif');


  if(isset($_POST["submitAdd"])) {
      //Kiểm tra xem có phải là ảnh bằng hàm getimagesize
      $check = getimagesize($_FILES["hinh"]["tmp_name"]);
      if($check !== false)
      {
          echo "Đây là file ảnh - " . $check["mime"] . ".";
          $allowUpload = true;
      }
      else
      {
          echo "Không phải file ảnh.";
          $allowUpload = false;
      }
  }

  // Kiểm tra nếu file đã tồn tại thì không cho phép ghi đè
  // Bạn có thể phát triển code để lưu thành một tên file khác
  if (file_exists($target_file))
  {
      echo "Tên file đã tồn tại trên server, không được ghi đè";
      $allowUpload = false;
  }
  // Kiểm tra kích thước file upload cho vượt quá giới hạn cho phép
  if ($_FILES["hinh"]["size"] > $maxfilesize)
  {
      echo "Không được upload ảnh lớn hơn $maxfilesize (bytes).";
      $allowUpload = false;
  }

  // Kiểm tra kiểu file
  if (!in_array($imageFileType,$allowtypes ))
  {
      echo "Chỉ được upload các định dạng JPG, PNG, JPEG, GIF";
      $allowUpload = false;
  }

  if ($allowUpload)
  {
      // Xử lý di chuyển file tạm ra thư mục cần lưu trữ, dùng hàm move_uploaded_file
      if (move_uploaded_file($_FILES["hinh"]["tmp_name"], $target_file))
      {
        $sql="INSERT INTO xe (maxe, tenxe, mota, gia,  hinh, maloai)  
                    VALUES (?,       ?,      ?,    ?,     ?,    ?)";
          $stm= $conn->prepare($sql);
          $stm->execute($arr);
          
          echo "<br>File ". basename( $_FILES["hinh"]["name"]).
          " Đã upload thành công.<br>";
          echo "File lưu tại " . $target_file; 
      }
      else
      {
          echo "Có lỗi xảy ra khi upload file.";
      }
  }
  else
  {
      echo "Không upload được file, có thể do file lớn, kiểu file không đúng ...";
  }
  //header('location:index.php');

?>

<p>
<a href="indexAdmin.php">Tiếp tục</a>
</p>