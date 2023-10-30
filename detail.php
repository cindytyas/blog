<?php 
$title = 'Detail';
include ('components/header.php');
$data = mysqli_fetch_array (mysqli_query($connect, "SELECT * FROM posts INNER JOIN users ON posts.user_id=users.id WHERE posts.slug='$_GET[title]'"));
?>

<header class="detail hero-post py-5">
    <div class="container">
    <span class="bg-light rounded p-2 fw-bold text-primary category mx-auto d-block" style="width: max-content;">the newest</span>
    <h1 class="header-title text-center"><?= $data['title']?></h1>

    <div class="d-flex align-items-center justify-content-center gap-3">
        <img src="assets/img/users/<?= $data['photo']?>" class="avatar rounded-cirle" alt="">
        <div class="profile">
            <p class="m-0 text-primary"><?= $data['name']?></p>
            <p class="m-0 text-secondary" style="font-size: 14px;"><?= $data['email']?></p>
            </div>
        </div>
        <img src="assets/img/posts/<?= $data['image']?>" class="rouded-3 mt-5" alt="">
    </div>
</header>

<section class="detail-content mx-auto py-5">
    <div class="container">
        <?= $data['body']?>
    </div>
</section>

<?php include ('components/footer.php')?>