<p id="title">Minesweeper</p>

    <div id="board">
@foreach( $ids as $id )
    <div id="{{ $id }}"></div>
@endforeach
    </div>

<script type="text/javascript">
    document.grid = [];
    function load() {
        var data = document.grid;
        var cell = 0;
        for(var i = 0; i < data.length; i++) {
            for(var j = 0; j < data[i].length; i++) {
                if(data[i][j] === 'bomb') {
                    document.getElementById('board').children[cell].setAttribute('class', 'lost');
                }
                cell = cell + 1;
            }
        }
    }
</script>
