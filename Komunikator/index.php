<!DOCTYPE html>
<!-- Emil Gielek & Szymon Gładki  CHAT APP-->
<html lang="en">
    <head>
        <meta charset="UFT-8">
        <meta name="vierwport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Komunikator szkolny</title>
        <link rel="stylesheet" href="style.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">
    </head> 
    <body> 
        <div class="wrapper">
            <section class="form signup">
                <header>Komunikator szkolny</header>
                <form action="#">  
                    <div class="errorText">To jest komunikat błędu!</div>
                        <div class="personalData">
                            <div class="Dane input">
                            <label>Imie:</label>
                            <input type="text" placeholder=" Imie">
                        </div>
                        <div class="Dane input">
                            <label>Nazwisko:</label>
                            <input type="text" placeholder=" Nazwisko">
                        </div>
                        </div>
                    <div class="Dane input">
                        <label> Adres email:</label>
                        <input type="text" placeholder=" Adres email">
                    </div>
                    <div class="Dane input">
                        <label>Hasło:</label>
                        <input type="text" placeholder=" Hasło">
                    </div>
                    <div class="ProfilePhoto">
                        <label>Wybierz zdjęcie:</label>
                        <input type="file">
                    </div>
                    <div class="SingUp">
                        <input type="submit" value="Dołącz do czatu">
                    </div>
                   
                </form>
                <div class="LoginNow">Masz już konto? <a href="#">Zaloguj się</a></div> 
            </section>
        </div>
    </body>

</html>