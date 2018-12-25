@extends('layouts.base')

@section('content')
    <div class="row">
        <h3>Enter New Entry</h3>
    </div>
    <div class="row">
    <div class="col-md-6">
        <form id="entryForm" method="post" action={{Route('account.update')}}>
            {{csrf_field()}}
            <div class="form-group">
                <label for="amount">Amount</label>
                <input type="text" name="amount" class="form-control" id="amount" aria-describedby="amount" placeholder="Enter amount" required>
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <textarea rows="4" name="description" class="form-control" id="description" aria-describedby="description" placeholder="Enter description"></textarea>
            </div>
            <div class="form-group">
                <label for="typeSelect">Select Type</label>
                <select class="form-control" id="typeSelect" name="type" required>
                    <option value="1">INCOME</option>
                    <option value="2">COST</option>
                </select>
            </div>
            <button type="submit" id="submitEntry" class="btn btn-primary">Submit</button>
        </form>
    </div>
    </div>
@endsection

@section('script')
    <script>
        $('#entryForm').submit(function (e) {
            var form = $(this);
            var url = form.attr('action');

            $.ajax({
                type: "POST",
                url: url,
                data: form.serialize(),
                success: function(data)
                {
                    swal("Success!", "Account entry inserted successfully", "success").then( function (e) {
                        location.reload();
                    });
                },
                error: function (data) {
                    swal("Error!", JSON.stringify(data.responseJSON.errors), "error");
                }
            });
            e.preventDefault();
        });
    </script>
@endsection