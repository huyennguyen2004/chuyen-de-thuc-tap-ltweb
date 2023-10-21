<?php 
use App\Models\Brand;
$list=Brand :: where('status','!=',0)
->orderBy('created_at','DESC')
->get();
?>

<?php require_once '../views/backend/header.php';?>

      <!-- CONTENT-->
      <form action="index.php?option=brand&cat=process" method='post' enctype="multipart/form-data">
      <div class="content-wrapper">
         <section class="content-header">
            <div class="container-fluid">
               <div class="row mb-2">
                  <div class="col-sm-12">
                     <h1 class="d-inline">Tất cả thương hiệu</h1>
                  </div>
               </div>
            </div>
         </section>
         <!-- Main content -->
         <section class="content">
            <div class="card">
               <div class="card-header text-right">
<div class="row">
   <div class="col-md-6 text-left">
      <a href="index.php?option=brand">Tat ca</a>|
      <a href="index.php?option=brand&cat=trash">Thung rac</a>
   </div>
   <div class="col-md-6 text-right ">
       <button class="btn btn-sm btn-success" type="submit" name="them">
                     <i class="fa fa-save" aria-hidden="true"></i>
                     Lưu
                  </button>
   </div>
</div>    
               </div>
               <div class="card-body">
                  <div class="text-success">
              <?php echo $_SESSION['message']??"";?>
            </div>
                  <div class="row">
                     <div class="col-md-4">
                        <div class="mb-3">
                           <label>Tên thương hiệu (*)</label>
                           <input type="text" name="name" class="form-control">
                        </div>
                        <div class="mb-3">
                           <label>Slug</label>
                           <input type="text" name="slug" class="form-control">
                        </div>
                        <div class="mb-3">
                           <label>Mo ta</label>
                           <textarea name="description" class="form-control"></textarea>
                        </div>
                        <div class="mb-3">
                           <label>Hình đại diện</label>
                           <input type="file" name="image" class="form-control">
                        </div>
                        <div class="mb-3">
                           <label>Trạng thái</label>
                           <select name="status" class="form-control">
                              <option value="1">Xuất bản</option>
                              <option value="2">Chưa xuất bản</option>
                           </select>
                        </div>
                     </div>
                     <div class="col-md-8">
                        <table class="table table-bordered">
                           <thead>
                              <tr>
                                 <th class="text-center" style="width:30px;">
                                    <input type="checkbox">
                                 </th>
                                 <th class="text-center" style="width:130px;">Hình ảnh</th>
                                 <th>Tên thương hiệu</th>
                                 <th>Tên slug</th>
                              </tr>
                           </thead>
                           <tbody>
                           <?php if(count($list)>0):?>
                              <?php foreach($list as $item):?>
                              <tr class="datarow">
                                 <td>
                                    <input type="checkbox">
                                 </td>
                                 <td>
                                    <img src="../public/images/brand/<?=$item->image;?>" alt="brand.jpg">
                                 </td>
                                 <td>
                                    <div class="name">
                                       <?=$item->name;?>
                                    </div>
                                    <div class="function_style">
                                       <?php if($item->status==1):?>
                                       <a class="btn btn-success btn-xs" href="index.php?option=brand&cat=status&id=<?=$item->id;?>">Hiện</a>|
                                       <?php else:?>
                                       <a class="btn btn-danger btn-xs" href="index.php?option=brand&cat=status&id=<?=$item->id;?>">Ẩn</a>|
                                          <?php endif;?>
                                       <a class="btn btn-info btn-xs " href="index.php?option=brand&cat=edit&id=<?=$item->id;?>">Chỉnh sửa</a> |
                                       <a class="btn btn-warning btn-xs"href="index.php?option=brand&cat=show&id=<?=$item->id;?>">Chi tiết</a> |
                                       <a class="btn btn-danger btn-xs"href="index.php?option=brand&cat=delete&id=<?=$item->id;?>">Xoá</a>
                                    </div>
                                 </td>
                                 <td><?=$item->slug;?></td>
                              </tr>
                              <?php endforeach;?>
                              <?php endif;?>
                           </tbody>
                        </table>
                     </div>
                  </div>
               </div>
            </div>
         </section>
      </div>
      <!-- END CONTENT-->
      <?php require_once '../views/backend/footer.php';?>