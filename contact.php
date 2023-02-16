<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/PHPMailer/src/Exception.php';
require 'vendor/PHPMailer/src/PHPMailer.php';
require 'vendor/PHPMailer/src/SMTP.php';

require 'includes/init.php';

$email = '';
$subject = '';
$message = '';
$sent = false;

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];

    $errors = [];

    if (filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
        $errors[] = 'Wprowadź mail w poprawnym formacie';
    }

    if ($subject == '') {
        $errors[] = 'Wpisz temat';
    }

    if ($message == '') {
        $errors[] = 'Wpisz wiadomość';
    }

    if (empty($errors)) {

        $mail = new PHPMailer(true);

        try {

            $mail->isSMTP();
            $mail->Host = SMTP_HOST;
            $mail->SMTPAuth = true;
            $mail->Username = SMTP_USER;
            $mail->Password = SMTP_PASS;
            $mail->SMTPSecure = 'tls';
            $mail->Port = 587;

            $mail->setFrom('sender@example.com');
            $mail->addAddress('recipient@example.com');
            $mail->addReplyTo($email);
            $mail->Subject = $subject;
            $mail->Body = $message;

            $mail->send();

            $sent = true;

        } catch (Exception $e) {

            $errors[] = $mail->ErrorInfo;

        }
    }
}

?>
<?php require 'includes/header.php'; ?>

<header class="masthead" style="background-image: url('assets/img/contact-bg.jpg')">
    <div class="container position-relative px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-md-10 col-lg-8 col-xl-7">
                <div class="page-heading">
                    <h1>W kontakcie!</h1>
                    <span class="subheading">Czego dusza potrzebuje? Słucham</span>
                </div>
            </div>
        </div>
    </div>
</header>

<main class="container px-4 px-lg-5 mb-4">

    <div class="container px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-md-10 col-lg-8 col-xl-7">
                <p>
                    Pytania? Sugestie? Podziękowania? Jak najbardziej, wszystko to chętnie przeczytam, także jak coś to
                    pisz!</p>
                <div class="my-5">

                    <?php if ($sent): ?>
                        <p>Message sent.</p>
                    <?php else: ?>

                        <?php if (!empty($errors)): ?>
                            <ul>
                                <?php foreach ($errors as $error): ?>
                                    <li>
                                        <?= $error ?>
                                    </li>
                                <?php endforeach; ?>
                            </ul>
                        <?php endif; ?>

                        <form method="post" id="formCntact">

                            <div class="form-floating">
                                <input class="form-control" name="email" id="email" type="email" placeholder="Your email"
                                    value="<?= htmlspecialchars($email) ?>">
                                <label for="email">Twój email</label>
                            </div>

                            <div class="form-floating">
                                <input class="form-control" name="subject" id="subject" placeholder="Subject"
                                    value="<?= htmlspecialchars($subject) ?>">
                                <label for="subject">Temat</label>
                            </div>

                            <div class="form-floating">
                                <textarea class="form-control" name="message" id="message"
                                    placeholder="Message"><?= htmlspecialchars($message) ?></textarea>
                                <label for="message">Wiadomość</label>
                            </div>

                            <button class="btn btn-primary text-uppercase mt-4" id="submitButton"
                                type="submit">W świat!</button>

                        </form>

                    <?php endif; ?>




                </div>
            </div>
        </div>
    </div>

    <?php require 'includes/footer.php'; ?>