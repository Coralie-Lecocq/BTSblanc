<!-- Contact -->
<section id="contact">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h2 class="section-heading text-uppercase">Nous contacter</h2>
                <h3 class="section-subheading" style="color:#fed136;">Pour toute information sur la borne photo, la location ou problème sur votre commande</h3>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 text-center">
                <h2 class="section-heading text-uppercase">Par téléphone</h2>
                <p style="color:#fed136;">06 06 62 18 17</p>
            </div>
        </div>
        <div class="row">
          <div class="col-lg-12 text-center">
            <h2 class="section-heading text-uppercase">Par mail</h2>
          </div>
            <div class="col-lg-12">
                <form id="contactForm" name="sentMessage" novalidate="novalidate" method="post">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <input class="form-control" id="name" type="text" name="name" placeholder="Votre nom" required=""
                                data-validation-required-message="Merci de renseigner votre nom">
                                <p class="help-block text-danger"></p>
                            </div>
                            <div class="form-group">
                                <input class="form-control" id="email" type="email" name="email" placeholder="Votre email" required=""
                                data-validation-required-message="Merci de renseigner votre adresse email"
                                <p class="help-block text-danger"></p>
                            </div>
                            <div class="form-group">
                                <input class="form-control" id="subject" type="text" name="subject" placeholder="Sujet du message" required=""
                                data-validation-required-message="Merci de renseigner le sujet de votre message">
                                <p class="help-block text-danger"></p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <textarea class="form-control" id="message" name="message" placeholder="Votre message" required=""
                                data-validation-required-message="Merci d'entrer votre message"></textarea>
                                <p class="help-block text-danger"></p>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                        <div class="col-lg-12 text-center">
                            <div id="success"></div>
                            <button id="sendMessageButton" class="btn btn-primary btn-xl text-uppercase" type="submit">Envoyer</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
