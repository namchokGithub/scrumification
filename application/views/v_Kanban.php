<!--
 - Activity Report
 -
 - @Author	Namchok Singhachai
 - @Create Date 27-01-2564
-->

<div class="drag-container"></div>

<div class="panel panel-primary" style="position: relative !important;width: 100% !important;">
    <div class="panel-heading " style=" font-size: 28px; ">
        <div class="">
            <i class="fa fa-television"></i> Kanban
        </div>
    </div>
    <div class="panel-body">
        <div class="drag-container"></div>
        <div class="board">
            <div class="board-column todo">
                <div class="board-column-container">
                    <div class="board-column-header">Todo</div>
                    <div class="board-column-content-wrapper">
                        <div class="board-column-content" id="todo">
                            
                        </div>
                    </div>
                </div>
            </div>
            <div class="board-column working">
                <div class="board-column-container">
                    <div class="board-column-header">Doing</div>
                    <div class="board-column-content-wrapper">
                        <div class="board-column-content">
                            <div class="board-item">
                                <div class="board-item-content"><span>Item #</span>6</div>
                            </div>
                            <div class="board-item">
                                <div class="board-item-content"><span>Item #</span>7</div>
                            </div>
                            <div class="board-item">
                                <div class="board-item-content"><span>Item #</span>8</div>
                            </div>
                            <div class="board-item">
                                <div class="board-item-content"><span>Item #</span>9</div>
                            </div>
                            <div class="board-item">
                                <div class="board-item-content"><span>Item #</span>10</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="board-column done">
                <div class="board-column-container">
                    <div class="board-column-header">Done</div>
                    <div class="board-column-content-wrapper">
                        <div class="board-column-content">
                            <div class="board-item">
                                <div class="board-item-content"><span>Item #</span>11</div>
                            </div>
                            <div class="board-item">
                                <div class="board-item-content"><span>Item #</span>12</div>
                            </div>
                            <div class="board-item">
                                <div class="board-item-content"><span>Item #</span>13</div>
                            </div>
                            <div class="board-item">
                                <div class="board-item-content"><span>Item #</span>14</div>
                            </div>
                            <div class="board-item">
                                <div class="board-item-content"><span>Item #</span>15</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End panel body -->
</div>
<!-- End panel -->

<script src="https://cdn.jsdelivr.net/npm/muuri@0.9.3/dist/muuri.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/web-animations-js@2.3.2/web-animations.min.js"></script>
<script>
        $(document).ready(function() {
            $('#todo').html(`<div class="board-item">
                                <div class="board-item-content"><span>Item #</span>1</div>
                            </div>
                            <div class="board-item">
                                <div class="board-item-content"><span>Item #</span>2</div>
                            </div>
                            <div class="board-item">
                                <div class="board-item-content"><span>Item #</span>3</div>
                            </div>
                            <div class="board-item">
                                <div class="board-item-content"><span>Item #</span>4</div>
                            </div>
                            <div class="board-item">
                                <div class="board-item-content"><span>Item #</span>5</div>
                            </div>`);
                            
            var dragContainer = document.querySelector('.drag-container');
            var itemContainers = [].slice.call(document.querySelectorAll('.board-column-content'));
            var columnGrids = [];
            var boardGrid;

            // Init the column grids so we can drag those items around.
            itemContainers.forEach(function(container) {
                var grid = new Muuri(container, {
                        items: '.board-item',
                        dragEnabled: true,
                        dragSort: function() {
                            return columnGrids;
                        },
                        dragContainer: dragContainer,
                        dragAutoScroll: {
                            targets: (item) => {
                                return [{
                                    element: window,
                                    priority: 0
                                }, {
                                    element: item.getGrid().getElement().parentNode,
                                    priority: 1
                                }, ];
                            }
                        },
                    })
                    .on('dragInit', function(item) {
                        console.log('ยก')
                        item.getElement().style.width = item.getWidth() + 'px';
                        item.getElement().style.height = item.getHeight() + 'px';
                    })
                    .on('dragReleaseEnd', function(item) {
                        console.log('ปล่อย')
                        console.log(item)
                        item.getElement().style.width = '';
                        item.getElement().style.height = '';
                        item.getGrid().refreshItems([item]);
                    })
                    .on('layoutStart', function() {
                        boardGrid.refreshItems().layout();
                    });

                columnGrids.push(grid);
            });

            // Init board grid so we can drag those columns around.
            boardGrid = new Muuri('.board', {
                dragEnabled: false,
                dragHandle: '.board-column-header'
            });
    });
</script>

<style>
    * {
        box-sizing: border-box;
    }
    
    .drag-container {
        position: fixed;
        left: 0;
        top: 0;
        z-index: 1000;
    }
    
    .board {
        position: relative;
    }
    
    .board-column {
        position: absolute;
        left: 0;
        top: 0;
        padding: 0 10px;
        width: calc(100% / 3);
        z-index: 1;
    }
    
    .board-column.muuri-item-releasing {
        z-index: 2;
    }
    
    .board-column.muuri-item-dragging {
        z-index: 3;
        cursor: move;
    }
    
    .board-column-container {
        position: relative;
        width: 100%;
        height: 100%;
    }
    
    .board-column-header {
        position: relative;
        height: 50px;
        line-height: 50px;
        overflow: hidden;
        padding: 0 20px;
        text-align: center;
        background: #333;
        color: #fff;
        border-radius: 5px 5px 0 0;
        font-weight: bold;
        letter-spacing: 0.5px;
        text-transform: uppercase;
    }
    
    @media (max-width: 600px) {
        .board-column-header {
            text-indent: -1000px;
        }
    }
    
    .board-column.todo .board-column-header {
        background: #4A9FF9;
    }
    
    .board-column.working .board-column-header {
        background: #f9944a;
    }
    
    .board-column.done .board-column-header {
        background: #2ac06d;
    }
    
    .board-column-content-wrapper {
        position: relative;
        padding: 8px;
        background: #f0f0f0;
        height: calc(100vh - 90px);
        overflow-y: auto;
        border-radius: 0 0 5px 5px;
    }
    
    .board-column-content {
        position: relative;
        min-height: 100%;
    }
    
    .board-item {
        position: absolute;
        width: calc(100% - 16px);
        margin: 8px;
    }
    
    .board-item.muuri-item-releasing {
        z-index: 9998;
    }
    
    .board-item.muuri-item-dragging {
        z-index: 9999;
        cursor: move;
    }
    
    .board-item.muuri-item-hidden {
        z-index: 0;
    }
    
    .board-item-content {
        position: relative;
        padding: 20px;
        background: #fff;
        border-radius: 10px;
        font-size: 17px;
        cursor: pointer;
        -webkit-box-shadow: 0px 1px 3px 0 rgba(0, 0, 0, 0.2);
        box-shadow: 0px 1px 3px 0 rgba(0, 0, 0, 0.2);
    }
    
    @media (max-width: 600px) {
        .board-item-content {
            text-align: center;
        }
        .board-item-content span {
            display: none;
        }
    }
</style>