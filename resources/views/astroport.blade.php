
    <p id='astroport-name'>Astroport</p>

    <ul id='gate-1' class='occupied'> Gate 1
        <li id='ship-1'>Ship 1</li>
        <li id='ship-2'>Ship 2</li>
        <li id='ship-3'>Ship 3</li>
    </ul>
    <ul id='gate-2' class='occupied'> Gate 2
        <li id='ship-1'>Ship 1</li>
        <li id='ship-2'>Ship 2</li>
        <li id='ship-3'>Ship 3</li>
    </ul>
    <ul id='gate-3' class='occupied'> Gate 3
        <li id='ship-1'>Ship 1</li>
        <li id='ship-2'>Ship 2</li>
        <li id='ship-3'>Ship 3</li>
    </ul>
    <a id='info' class='hidden'>hello</a>
    <form>
    Ship 
        <input type="text" id="ship" name="ship"/>
    <script>
        document.getElementById('ship').addEventListener('keydown', function (e) {
            document.getElementById('info').className = 'hidden';
        })
    </script>
        <input type='button' name='dock' id='dock' value='Dock' action='#'/>
    <script>
        document.getElementById('dock').addEventListener('click', function (e) {
            document.getElementById('ship-1').innerHTML = document.getElementById('ship').value;
            document.getElementById('ship').value = '';
            document.getElementById('info').className = '';
        })
    </script>
    </form>