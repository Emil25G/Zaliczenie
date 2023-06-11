var myVar = setInterval(displayMessages, 5000);


document.addEventListener('DOMContentLoaded', function() {
    var button = document.getElementById('butsave');
    button.addEventListener('click', function(event) {
        event.preventDefault(); 

        var msg = document.querySelector("textarea[name='msg']").value;
        if (msg !== "") {
            var xhr = new XMLHttpRequest();
            var url = 'php/save.php';
            var params = 'msg=' + encodeURIComponent(msg);

            xhr.open('POST', url, true);
            xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');

            xhr.onreadystatechange = function() {
                if (xhr.readyState === 4 && xhr.status === 200) {
                    console.log(xhr.responseText);
                } else if (xhr.readyState === 4) {
                    console.log('Wystąpił błąd podczas wysyłania żądania.');
                }
            };

            xhr.send(params);
        } else {
            alert('Pole wiadomość jest wymagane.');
        }
    });
});


function displayMessages() {
    var xhr = new XMLHttpRequest();
    var url = 'php/process.php';

    xhr.open('GET', url, true);

    xhr.onreadystatechange = function() {
        if (xhr.readyState === 4 && xhr.status === 200) {
            var response = JSON.parse(xhr.responseText);

            if (response.status === 'success') {
                var messages = response.messages;

                
                var recordTable = document.getElementById('MyTable');
                recordTable.innerHTML = '';


                for (var i = 0; i < messages.length; i++) {
                    var user = messages[i].user;
                    var message = messages[i].message;
                    var timestamp = messages[i].timestamp;
                    
                    var row = document.createElement('tr');


                    var userCell = document.createElement('td');

                    userCell.textContent = user;

                    
                    var messageCell = document.createElement('td');
                    messageCell.textContent = message;
                    
                    var timestampCell = document.createElement('td');
                    timestampCell.textContent = timestamp;

                    
                    row.appendChild(userCell);
                    row.appendChild(messageCell);
                    row.appendChild(timestampCell);

                   
                    recordTable.appendChild(row);
                }
            } else {
                console.log(response.message);
            }
        } else if (xhr.readyState === 4) {
            console.log('Wystąpił błąd podczas pobierania wiadomości.');
        }
    };

    xhr.send();
}
