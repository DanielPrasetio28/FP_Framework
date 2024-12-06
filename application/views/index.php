<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?></title>
    <link rel="stylesheet" href="<?= base_url('assets/style.css') ?>">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.min.js"></script>
    <style>
        @font-face {
        font-family: 'Helvetica';
        src: local('Helvetica'), url('Helvetica.ttf') format('truetype');
    }

    body {
        font-family: Helvetica, sans-serif;
        margin: 0;
        padding: 0;
        background-color: #f4f4f4;
    }

    .container {
        width: 960px;
        margin: 0 auto;
        max-width: 1024px;
    }

    header {
        background-color: #253439;
        color: #fff;
        padding: 20px 0;
    }

    nav ul {
        list-style-type: none;
        padding: 0;
        margin: 0;
        display: flex;
        justify-content: flex-end;
    }

    nav ul li {
        margin-left: 20px;
    }

    nav ul li:first-child {
        margin-left: 0;
    }

    nav ul li a {
        font-weight: 500;
        font-size: 20px;
        color: #fff;
        text-decoration: none;
        transition: color 0.3s ease;
    }

    nav ul li a:hover {
        color: #f4f4f4;
    }

    .profile {
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .profile img {
        border-radius: 50%;
        width: 125px;
        height: 125px;
    }

    .content {
        padding: 20px 0;
        background-color: #f4f4f4;
        display: none;
    }

    .active {
        display: block;
    }

    /* Section Profil */
    .h2-profil {
        color: #253439;
        font-size: 50px;
        font-weight: bold;
        margin-bottom: 10px;
        margin-top: 100px;
    }

    .alamat {
        color: #636363;
        font-size: 20px;
        font-weight: bold;
        margin-bottom: 20px;
    }

    .profilsingkat {
        color: #253439;
        font-size: 20px;
        margin-bottom: 40px;
    }

    .contact img {
        width: 40px;
        height: 40px;
        display: inline-block;
        margin-right: 10px;
    }

    .contact a {
        text-decoration: none;
    }

    .contact img:hover {
        opacity: 0.8;
        transition: opacity 0.3s ease;
    }

    /* Section Pendidikan & Pengalaman */
    .h2-headerPendidikan {
        color: #253439;
        font-size: 40px;
        font-weight: bold;
        margin-bottom: 30px;
        margin-top: 50px;
    }

    .h2-headerPengalaman {
        color: #253439;
        font-size: 40px;
        font-weight: bold;
        margin-bottom: 30px;
        margin-top: 50px;
    }

    .h2-contentPendidikan,
    .h2-contentPengalaman {
        color: #253439;
        font-size: 25px;
        border-bottom: 2px solid #253439;
        margin-bottom: 10px;
    }

    .tanggalPendidikan,
    .tanggalPengalaman {
        color: #4d4d4d;
        font-size: 18px;
        font-weight: bold;
        margin-bottom: 20px;
    }

    .keteranganPendidikan,
    .keteranganPengalaman {
        color: #253439;
        font-size: 18px;
        margin-bottom: 30px;
    }

    /* Section Skill */
    .h2-skill {
        color: #253439;
        font-size: 40px;
        font-weight: bold;
        margin-bottom: 30px;
        margin-top: 100px;
    }

    .keteranganSkill {
        color: #636363;
        font-size: 20px;
        font-weight: bold;
        margin-bottom: 30px;
    }

    .skills table {
        width: 50%;
        border-collapse: collapse;
    }

    .skill-item img {
        width: 75px;
        height: 75px;
    }

    .skill-item {
        text-align: center;
        margin-bottom: 20px;
    }
    </style>
    <script>
        $(document).ready(function(){
            $("#profil").show();

            $("nav ul li a").click(function(event){
                event.preventDefault();
                var section = $(this).attr("href");

                $(".content").fadeOut(500, function(){
                    $(section).fadeIn(500).addClass("active");
                });
            });
        });
    </script>
</head>
<body>
    <header>
        <div class="container">
            <div class="profile">
                <img src="<?= $profile_picture ?>" alt="Profile Picture">
                <nav>
                    <ul>
                        <li><a href="#profil" class="menu1">Profil</a></li>
                        <li><a href="#pendidikanPengalaman" class="menu2">Pendidikan & Pengalaman</a></li>
                        <li><a href="#skill" class="menu3">Skill</a></li>
                    </ul>
                </nav>
            </div>
        </div>
    </header>

    <section id="profil" class="content active">
        <div class="container">
            <div class="about">
                <h2 class="h2-profil"><?= $name ?></h2>
                <p class="alamat"><?= $address ?> · <?= $phone ?> · <?= $email ?></p>
            </div>
            <p class="profilsingkat">
                Memiliki bekal pendidikan di Universitas Pembangunan Nasional Veteran Jawa Timur, khususnya dalam program studi Informatika, 
                saya merasa terdorong untuk terus mendalami dunia pemrograman. Selain itu, kegiatan saya yang sering melibatkan pengeditan grafis memperkuat 
                minat saya untuk mengembangkan kemampuan tersebut dalam ranah yang lebih spesifik, terutama dalam bidang Front-End Development.
            </p>
            <div class="contact">
                <a href="mailto:<?= $email ?>">    
                    <img src="<?= $email_icon ?>" alt="Email">
                </a>  
                <a href="https://wa.me/<?= $phone ?>"> 
                    <img src="<?= $whatsapp_icon ?>" alt="WhatsApp">
                </a>
                <a href="https://www.instagram.com/_dan_pras/">    
                    <img src="<?= $instagram_icon ?>" alt="Instagram">
                </a>
            </div>
        </div>
    </section>

    <section id="pendidikanPengalaman" class="content active">
        <div class="container">
            <div>
                <h2 class="h2-headerPendidikan">PENDIDIKAN</h2>

                <h2 class="h2-contentPendidikan"><?=$school_sd ??"?></h2>
                <p class="tanggalPendidikan"><?=$year_smp?? "?></p>

                <h2 class="h2-contentPendidikan"><?=$school_smp ??"?></h2>
                <p class="tanggalPendidikan"><?=$year_smp?? "?></p>

                <h2 class="h2-contentPendidikan"><?=$school_sma ??"?></h2>
                <p class="tanggalPendidikan"><?=$year_sma ??"?></p>

                <h2 class="h2-contentPendidikan"><?=$school_univ ??"?></h2>
                <p class="tanggalPendidikan"><?=$year_univ ??"?></p>
            </div>
            <div>
                <h2 class="h2-headerPengalaman">PENGALAMAN</h2>

                <h2 class="h2-contentPendidikan"><?=$company ??"?></h2>
                <p class="tanggalPendidikan"><?=$year_company ??"?></p>
                <p class="keteranganPengalaman"><?=$position ??"?></p>
            </div>
        </div>
    </section>

    <section id="skill" class="content">
        <div class="container">
            <div class="about">
                <h2 class="h2-skill">SKILLS</h2>
                <p class="keteranganSkill">PROGRAMMING LANGUAGES & TOOLS</p>
            </div>
            <div class="skills">
                <table>
                    <tr>
                        <?php foreach ($skills as $skill): ?>
                            <td>
                                <div class="skill-item">
                                    <img src="<?= $skill['icon'] ?>" alt="<?= $skill['name'] ?>">
                                </div>
                            </td>
                        <?php endforeach; ?>
                    </tr>
                </table>
            </div>
        </div>
    </section>
</body>
</html>
