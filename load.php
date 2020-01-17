<?php
include('conf/DB.class.php');

$limit = array_keys($_POST);
$instance = ConnectDb::getInstance();
$conn = $instance->getConnection();
foreach($conn->query("SELECT p.image_url, p.title, p.date, p.excerpt, u.Name, u.Surname from blog.posts p LEFT JOIN blog.users u on p.id = u.id_posts LIMIT $limit[0];") as $row) {
    ?>
    <div class="entry clearfix">
        <div class="entry-image">
            <a href="#">
                <img class="image_fade" src="<?=$row['image_url'] ?>">
            </a>
        </div>
        <div class="entry-title">
            <h2>
                <a href="single.html">
                    <?=$row['title'] ?>
                </a>
            </h2>
        </div>
        <ul class="entry-meta clearfix">
            <li><i class="icon-calendar3"></i> 10th February 2014</li>
            <li>
                <a href="#">
                    <i class="icon-user"></i>
                    admin
                </a>
            </li>
            <li>
                <i class="icon-folder-open"></i>
                <a href="#">General</a>, <a href="#">Media</a>
            </li>
            <li>
                <a href="#">
                    <i class="icon-comments"></i>
                    13 Comments
                </a>
            </li>
        </ul>
        <div class="entry-content">
            <p>
                <?=$row['excerpt'] ?></p>
            <a href="#" class="more-link">Read More</a>
        </div>
    </div>
<?php
}