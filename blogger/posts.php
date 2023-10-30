<?php 
$title = 'Posts';
include ('components/header.php');
?>
<section class="py-5">
    <div class="container">
        <div class="d-flex align-items-center justify-content-between mb-3">
            <h4 class="text-primary fw-bold">Posts</h4>
            <a href="create-post.php" class="btn btn-primary">Create New Post</a>
        </div>
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Post Title</th>
                        <th>Post category</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    $query = mysqli_query($connect, "SELECT * FROM posts WHERE user_id = '$_SESSION[user_id]'");
                    while($data = mysqli_fetch_array($query)){
                    ?>
                    <tr style="vertical-align: middle;">
                        <td><?= $no++ ?></td>
                        <td><?= $data['title'] ?></td>
                        <td>Programming</td>
                        <td>
                            <a href="edit-post.php?post_id=<?= $data['id']?>" class="btn btn-warning">Edit</a>
                            <a href="php/posts.php?action=delete&id=<?= $data['id'] ?>" onclick="return confirm('Are you sure to delete?')" class="btn btn-danger">Delete</a>
                        </td>
                    </tr>
                    <?php }?>
                </tbody>
            </table>
        </div>
    </div>
</section>

<?php include ('components/footer.php') ?>