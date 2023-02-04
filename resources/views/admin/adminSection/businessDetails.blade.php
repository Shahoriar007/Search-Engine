@extends('masterAdmin')
@section('businessDetails')

<!-- content @s -->
<div class="nk-content ">
    <div class="container-fluid">
        <div class="nk-content-inner">
            <div class="nk-content-body">
                <div class="components-preview wide-md mx-auto">
                    <div class="nk-block nk-block-lg">
                        <div class="card card-bordered">
                            <div class="card-inner">
                                <div class="row">
                                    <h4>Business Details</h4>

                                    <hr>

                                    <div class="row">
                                        <form action="">
                                            <div class="form-group col-md-3 col-lg-3 col-xl-3 required">
                                                <label for="input-pass">Name <span class="required-f">*</span></label>
                                                <input name="" id="" type="text"
                                                    placeholder="{{ $businessDetails->name }}">
                                            </div>
                                            <div class="form-group col-md-3 col-lg-3 col-xl-3 required">
                                                <label for="input-newpass">Form<span class="required-f">*</span></label>
                                                <input name="" id="" type="text"
                                                    placeholder="{{ $businessDetails->link_of }}">
                                            </div>
                                            <div class="form-group col-md-3 col-lg-3 col-xl-3 required">
                                                <label for="input-newpass">Link<span class="required-f">*</span></label>
                                                <input name="" id="" type="text"
                                                    placeholder="{{ $businessDetails->link }}">
                                            </div>
                                            <div class="form-group col-md-3 col-lg-3 col-xl-3 required">
                                                <button class="btn btn-primary" type="submit">Save Change</button>
                                            </div>

                                        </form>

                                    </div>

                                    <hr>

                                </div>
                            </div>

                        </div>

                        <div class="card card-bordered">
                            <div class="card-inner">
                            <h4>Keyword Input Form</h4>
                            <div class="row">
                                        <form method="POST" action="" >
                                            @csrf
                                            <div class="form-group col-md-3 col-lg-3 col-xl-3 required">
                                                <label for="input-pass">Keyword <span class="required-f">*</span></label>
                                                <input name="keyword" id="keyword" type="text">
                                            </div>
                                            <div class="form-group col-md-3 col-lg-3 col-xl-3 required">
                                                <label for="input-pass">Price <span class="required-f">*</span></label>
                                                <input name="price" id="price" type="text">
                                            </div>
                                            <div class="form-group col-md-3 col-lg-3 col-xl-3 required">
                                                <label for="input-pass">Quality <span class="required-f">*</span></label>
                                                <input name="quality" id="quality" type="text">
                                            </div>
                                           
                                            <div class="form-group col-md-3 col-lg-3 col-xl-3 required">
                                                <button class="btn btn-primary" type="submit">Save</button>
                                            </div>

                                        </form>

                                    </div>
                            </div>
                        </div>

                        <div class="card card-bordered">
                            <div class="card-inner">
                                <h4 class="">Keyword List</h4>

                                <table id="example" class="display" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>Id</th>
                                            <th>Keyword</th>
                                            <th>Price</th>
                                            <th>Quality</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        @foreach($keywordDetails as $item)

                                        <tr>
                                            <td>{{ $item->id }}</td>
                                            <td>{{ $item->keyword }}</td>
                                            <td>{{ $item->price }}</td>
                                            <td>{{ $item->quality }}</td>

                                        </tr>

                                        @endforeach

                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>Id</th>
                                            <th>Keyword</th>
                                            <th>Price</th>
                                            <th>Quality</th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div><!-- card -->
                </div><!-- .nk-block -->
            </div><!-- .components-preview -->
        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.6.2.min.js"
    integrity="sha256-2krYZKh//PcchRtd+H+VyyQoZ/e3EcrkxhM8ycwASPA=" crossorigin="anonymous"></script>

<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.js">
</script>

<script type="text/Javascript">

    // $(document).ready( function () {
    // $('#myTable').DataTable();
    // });

    $(document).ready(function () {
    // Setup - add a text input to each footer cell
    $('#example thead tr')
        .clone(true)
        .addClass('filters')
        .appendTo('#example thead');
 
    var table = $('#example').DataTable({
        orderCellsTop: true,
        fixedHeader: true,
        initComplete: function () {
            var api = this.api();
 
            // For each column
            api
                .columns()
                .eq(0)
                .each(function (colIdx) {
                    // Set the header cell to contain the input element
                    var cell = $('.filters th').eq(
                        $(api.column(colIdx).header()).index()
                    );
                    var title = $(cell).text();
                    $(cell).html('<input type="text" placeholder="' + title + '" />');
 
                    // On every keypress in this input
                    $(
                        'input',
                        $('.filters th').eq($(api.column(colIdx).header()).index())
                    )
                        .off('keyup change')
                        .on('change', function (e) {
                            // Get the search value
                            $(this).attr('title', $(this).val());
                            var regexr = '({search})'; //$(this).parents('th').find('select').val();
 
                            var cursorPosition = this.selectionStart;
                            // Search the column for that value
                            api
                                .column(colIdx)
                                .search(
                                    this.value != ''
                                        ? regexr.replace('{search}', '(((' + this.value + ')))')
                                        : '',
                                    this.value != '',
                                    this.value == ''
                                )
                                .draw();
                        })
                        .on('keyup', function (e) {
                            e.stopPropagation();
 
                            $(this).trigger('change');
                            $(this)
                                .focus()[0]
                                .setSelectionRange(cursorPosition, cursorPosition);
                        });
                });
        },
    });
});
   
</script>
@endsection