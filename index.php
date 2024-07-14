<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome on board</title>
    <link rel="stylesheet" href="/assets/styles/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&family=Source+Sans+3:ital,wght@0,200..900;1,200..900&display=swap" rel="stylesheet">
</head>

<body>
    <header>
        <?php include '_navbar.php' ?>
        <div class="container">
            <h1>Welcome on board!</h1>
            <img src="/assets/images/avatar.png" alt="">
        </div>
    </header>
    <main>
        <section class="container">
            <h2 id="articles">Recent articles</h2>
            <div class="articles">
                <article>
                    <img src="/assets/images/responsive.png" alt="Responsive">
                    <h3>Responsive</h3>
                    <a href="#">Read</a>
                </article>
                <article>
                    <img src="/assets/images/scalable.png" alt="Scalable">
                    <h3>Scalable</h3>
                    <a href="#">Read</a>
                </article>
                <article>
                    <img src="/assets/images/inclusive.png" alt="Inclusive">
                    <h3>Inclusive</h3>
                    <a href="#">Read</a>
                </article>
            </div>
        </section>
        <section class="container">
            <h2 id="about">About</h2>
            <p>
                Lorem, ipsum dolor sit amet consectetur adipisicing elit. Animi rerum debitis fugit similique laborum,
                eveniet nam ratione sed, itaque, minus in hic dolores suscipit molestias quis quibusdam error blanditiis
                sapiente.
                Laborum laudantium aut, consequuntur voluptatum animi eaque mollitia? Saepe neque facilis minima
                laborum, provident numquam ipsum laudantium totam porro placeat exercitationem voluptates quia explicabo
                temporibus sapiente non. Quo, repellat corrupti.
            </p>
            <p>
                Excepturi dolore saepe, temporibus est voluptate necessitatibus molestiae sit minima eum quisquam et qui
                quaerat nemo nam, consequuntur nisi alias in praesentium. Fuga amet esse nam doloremque ut nemo nostrum.
            </p>
        </section>
        <section class="container">
            <h2>Get in touch</h2>
            <?php
            $errors = [];
            $name = $email = $subject = $message = '';

            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                if (empty($_POST["name"])) {
                    $errors[] = "Le nom est obligatoire.";
                } else {
                    $name = htmlspecialchars($_POST["name"]);
                }

                if (empty($_POST["email"])) {
                    $errors[] = "L'email est obligatoire.";
                } elseif (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
                    $errors[] = "Format d'email invalide.";
                } else {
                    $email = htmlspecialchars($_POST["email"]);
                }

                if (empty($_POST["subject"])) {
                    $errors[] = "Le sujet est obligatoire.";
                } else {
                    $subject = htmlspecialchars($_POST["subject"]);
                }

                $message = isset($_POST["message"]) ? htmlspecialchars($_POST["message"]) : '';

                if (empty($errors)) {
                    header("Location: thank_you.php");
                    exit();
                }
            }
            ?>

            <?php if (!empty($errors)): ?>
                <h3>Please fix errors below</h3>
                <div class="errors">
                    <ul>
                        <?php foreach ($errors as $error): ?>
                            <li><?php echo $error; ?></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            <?php endif; ?>
            <form action="index.php" method="post">
                <div>
                    <label for="name">Name *</label>
                    <input type="text" id="name" name="name" >
                </div>
                <div>
                    <label for="email">Email *</label>
                    <input type="email" id="email" name="email" >
                </div>
                <div>
                    <label for="subject">Subject</label>
                    <select id="subject" name="subject" >
                        <option value="Prendre rendez-vous">Prendre rendez-vous</option>
                        <option value="Inscription à la newsletter">Inscription à la newsletter</option>
                        <option value="Réclamation">Réclamation</option>
                        <option value="Demander un devis">Demander un devis</option>
                    </select>
                </div>
                <div>
                    <label for="message">Message</label>
                    <textarea id="message" name="message"></textarea>
                </div>
                <div>
                    <button type="submit">Send</button>
                </div>
            </form>
        </section>
    </main>
    <?php include '_footer.php' ?>
</body>

</html>