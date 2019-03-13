
  $('#project_loan_return').DataTable({
                "processing": true,
                "serverSide": true,
                "responsive": true,

                "ajax": {
                    "url": "/finance/loan-return/getdata/"+id   
                },

                "columns": [
                    {data: 'transaction_no', name: 'transaction_no'},
                    {data: 'project_title', name: 'project_title'},
                    {data: 'payment_date', name: 'payment_date'},
                    {data: 'amount', name: 'amount',  render: $.fn.dataTable.render.number(',') },
                    {data: 'status', name: 'status'},
                    {data: 'remark', name: 'remark'}
                ]

});
$('#borrower').click(function(e) {
    e.preventDefault();
    $('#myModal').modal('show');

});