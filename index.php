<?php 
$title = 'Homepage';
include('components/header.php');
$last_post = mysqli_fetch_array(mysqli_query($connect, "SELECT * FROM posts INNER JOIN users ON posts.user_id=users.id ORDER BY posts.id DESC LIMIT 1"));
?>

    <header class="py-5">
        <div class="container">
            <h1 class="header-title text-primary text-center text-capitalize">Discover nice articles here</h1>
            <p class="text-secondary text-center text-capitalize">Lorem ipsum dolor sit amet consectetur adipisicing elit. Similique odit amet quam rem, tempore nisi?</p>
            <form action="#" method="get" class="d-flex align-items-center gap-2 bg-light rounded p-2">
                <div class="input-group">
                    <span class="input-group-text bg-trasparent border-0">
                    <i class="bi bi-search"></i>
                    </span>
                    <input type="search" name="search" id="search" class="form-control bg-transparent border-0" placeholder="Search">
                </div>
                <button type="submit" class="btn btn-primary">Go</button>
            </form>
        </div>
    </header>

    <?php if ($last_post != null) { ?>
    <section class="py-5">
        <div class="container">
            <a href="detail.php?title=<?= $last_post['slug'] ?>" class="row align-items-center hero-post">
                <div class="col-md-6">
                    <img src="assets/img/posts/<?= $last_post['image']?>" alt="" class="rounded-3 mb-3 hero-post-img">
                </div>
                <div class="col-md-6">
                    <span class="bg-light rounded p-2 fw-bold text-primary category">the newest</span>
                    <h2 class="hero-post-title text-primary text-capitalize mt-3"><?= $last_post['title']?></h2>
                    <p class="text-secondary"><?= (str_word_count($last_post['body']) > 60 ? substr($last_post['body'], 0, 200) . "....." : $last_post['body']) ?></p>
                    <div class="d-flex align-items-center gap-3">
                        <img src="assets/img/users/<?= $last_post['photo']?>" class="avatar rounded-cirle" alt="">
                        <div class="profile">
                            <p class="m-0 text-primary"><?= $last_post['name']?></p>
                            <p class="m-0 text-secondary" style="font-size: 14px;"><?= $last_post['email']?></p>
                        </div>
                    </div>
                </div>
            </a>
        </div>
    </section>
    <?php } ?>

    <section class="py-5">
        <div class="container">
            <div class="row">
                <?php 
                $query = mysqli_query($connect, "SELECT * FROM posts INNER JOIN users ON posts.user_id=users.id ORDER BY posts.id DESC");
                while($data = mysqli_fetch_array($query)){
                ?>
                <div class="col-md-4">
                    <a href="detail.php?title=<?= $data['slug']?>" class="card-post border-0 rouded-3 mb-3">
                        <img src="assets/img/posts/<?= $data['image']?>" alt="" class="card-img-top">              
                        <div class="card-body">
                            <span class="bg-light rounded p-2 fw-bold text-primary category">the newest</span>
                        <h2 class="card-post-title text-primary text-capitalize mt-3"><?= $data['tilte']?></h2>
                        <p class="text-secondary"><?= (str_word_count($data['body']) > 60 ? substr($data['body'], 0, 200) . "....." : $data['body']) ?></p>
                        <div class="d-flex align-items-center gap-3">
                            <img src="assets/img/users/<?= $data['photo']?>" class="avatar rounded-cirle" alt="">
                            <div class="profile">
                                <p class="m-0 text-primary"><?= $data['name']?></p>
                                <p class="m-0 text-secondary" style="font-size: 14px;"><?= $data['email']?></p>
                            </div>
                        </div>
                        </div>
                    </a>
                </div>
                <?php } ?>
            </div>
        </div>
    </section>

    <?php include ('components/footer.php')?>
