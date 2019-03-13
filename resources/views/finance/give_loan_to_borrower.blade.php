
<div class="form-wrapper">
  <div class="form-header"><h4>Loan Given To Borrower</h4></div>
  <div class="form-body">
    <table class="table table-striped" style="font-size:14px;">
      <tr>
        <td><label>Amount</label></td>
        <td>:{{number_format($giveLoanToBorrower['data']['amount'])}} MMK</td>
      </tr>
      <tr>
        <td><label>Payment Date</label></td>
        <td>: {{$giveLoanToBorrower['data']['payment_date']}}</td> 
      </tr>
      
      <tr>
        <td><label>Attachment</label></td>
          @if($giveLoanToBorrower['data']['attachment'] == "")
            <td>: There is no attachment file.</td>
          @else
            <td>: {{$giveLoanToBorrower['data']['attachment']}}</td>
          @endif
      </tr>
      <tr>
        <div class="prj_detail-info">
          <div class="project-information">
            <div class="project-detail">
              <td><label>Remark</label></td>
                <td class="right">:
                  <span class="comment more"> {{$giveLoanToBorrower['data']['remark']}} </span>          
                </td>
            </div>
          </div>
        </div>
      </tr>
    </table>
  </div>
</div>
     
