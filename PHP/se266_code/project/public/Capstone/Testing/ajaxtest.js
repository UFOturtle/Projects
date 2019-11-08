

httpRequest = new XMLHttpRequest();
.open('GET', '../Models/MYSQLQueries/MYSQLQueries.php?d=' + encodeURIComponent(d) + '&m=' + encodeURIComponent(mth) + '&y=' + encodeURIComponent(yr));
xhttp.send();
