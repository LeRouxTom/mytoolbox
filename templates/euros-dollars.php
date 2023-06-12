<?php
template('header', array(
    'title' => 'Boite à outils • Devise',
));
?>

    <!-- ======= About Section ======= -->
    <section id="homepage" class="homepage">
        <div class="container">
            <div class="section-title">
                <h2>Convertisseur de devise</h2>
            </div>

            <div class="row">

                <fieldset class="col-12 mt-4">
                    <legend>Convertisseur Devise</legend>
                    <form action="" method="post" name="euros-dollars" >
                        <div class="form-group row">
                            <div class="col">
                                <label for="EUR" aria-hidden="true" hidden>Euros</label>
                                <div class="input-group">
                                    <input id="montant" name="montant" type="text" class="form-control" required>
                                        <select name="from" id="from">
                                            <option value="EUR"selected>EUR</option>
                                            <option value="USB">USD</option>
                                            <option value="JPY">JPY</option>
                                            <option value="GBP">GBP</option>
                                            <option value="AUD">AUD</option>
                                            <option value="CAD">CAD</option>
                                            <option value="CHF">CHF</option>
                                        </select>
                                </div>
                            </div>
                            <div class="d-inline-flex align-items-center ">
                                <span class="ver">vaut actuellement</span>
                            </div>

                            <div class="col">
                                <label for="USD" aria-hidden="true" hidden>Dollars</label>
                                <div class="input-group">
                                    <input id="reponse" name="reponse" type="text" class="form-control" disabled>
                                        <select name="to" id="to">
                                            <option value="EUR">EUR</option>
                                            <option value="USD"selected>USD</option>
                                            <option value="JPY">JPY</option>
                                            <option value="GBP">GBP</option>
                                            <option value="AUD">AUD</option>
                                            <option value="CAD">CAD</option>
                                            <option value="CHF">CHF</option>
                                        </select>
                                </div>
                            </div>

                            <div class="col-2">
                                <button name="submit" type="submit" class="btn btn-primary btn-block">Calculer</button>
                            </div>

                            <!--https://fr.calcuworld.com/calculs-mathematiques/calculatrice-pourcentage/-->
                        </div>
                    </form>
                </fieldset>

                <fieldset class="col-12 mt-4">
                    <legend>Convertisseur quantité</legend>
                    <form action="" method="post" name="litre">
                        <div class="form-group row">
                            <div class="col">
                                <div class="input-group">
                                    <input id="debut" name="debut" type="text" class="form-control" required>
                                        <select name="de" id="de">
                                            <option value="L"selected>L</option>
                                            <option value="dL">dL</option>
                                            <option value="cL">cL</option>
                                            <option value="mL">mL</option>
                                        </select>
                                </div>
                            </div>
                            <div class="d-inline-flex align-items-center ">
                                <span class="ver">vaut actuellement</span>
                            </div>

                            <div class="col">
                                <div class="input-group">
                                    <input id="resultat" name="resultat" type="text" class="form-control" disabled>
                                        <select name="vers" id="vers">
                                            <option value="L">L</option>
                                            <option value="dL"selected>dL</option>
                                            <option value="cL">cL</option>
                                            <option value="mL">mL</option>
                                        </select>
                                </div>
                            </div>

                            <div class="d-inline-flex align-items-center ">
                                <span class="ver" id="invisible" style="display: none">quantite</span>
                            </div>

                            <div class="col-2">
                                <button name="submit" type="submit" class="btn btn-primary btn-block">Calculer</button>
                            </div>

                            <!--https://fr.calcuworld.com/calculs-mathematiques/calculatrice-pourcentage/-->
                        </div>
                    </form>
                </fieldset>

            </div>
    </section><!-- End Home Section -->


    <script type="text/javascript">
        window.addEventListener('load', () => {
            let forms = document.forms;

            for(form of forms){
                form.addEventListener('submit', async (event) => {
                    event.preventDefault();

                    const formData = new FormData(event.target).entries()

                    const response = await fetch('/api/post', {
                        method: 'POST',
                        headers: { 'Content-Type': 'application/json' },
                        body: JSON.stringify(
                            Object.assign(Object.fromEntries(formData), {form: event.target.name})
                        )
                    });

                    const result = await response.json();

                    let inputName = Object.keys(result.data)[0];
                    
                    event.target.querySelector(`input[name="${inputName}"]`).value = result.data[inputName];
                    
                })
            }
        });
    </script>

<?php template('footer');