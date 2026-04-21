<!-- 
Skapare: Erik Hägglund
Kurs: DT058G
Datum: 2025-06-02
Breif: Huvudmenyn som inkluderas i alla filer efter inloggning
-->

<nav id="mainmenu">
    <ul>
        <li><a href="index.php">Home</a></li> <!-- startsidan -->        
        <li>
            <div id="liDiv">
                <form action ="search.php" method="POST"> 
                    <label for="searchId">Search </label>
                    <input id="searchId" type="text" name="searchBar" placeholder="Search by username">
                    <input type="submit" name="search" value="search">
                </form>
            </div> 
        </li>        
        <li><a id="crtPost" href="create.php"> Create new post</a></li>        
    </ul>
</nav>

