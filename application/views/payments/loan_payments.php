<body class="">
    <div class="wrapper ">

        <!-- Top NavBar -->
        <? $this->load->view('navigation/sidebar');?>
        <!-- End of NavBar -->

        <div class="main-panel">

        <!-- Navbar -->
        <? $this->load->view('navigation/topbar');?>
        <!-- End Navbar -->

        <div class="content">
            <div class="container-fluid">
                        <div class="row" style="margin-top: -50px;">
                            <div class="col-md-12">

                                <div class="card">
                                    <div class="card-header border-bottom row">
                                        <div class="col-md-10">
                                            <h4 class=" font-weight-bold text-primary">Loan Information</h4>
                                        </div>
                                        <div class="col-md-2 text-right">
                                            <button class="btn btn-outline-primary btn-round pull-right btn-sm" rel="tooltip" title="Pay loan" data-target="#payment-modal" data-toggle="modal"><i class="material-icons">monetization_on</i> Pay Loan</button>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">

                                            <div class="col-md-4 card-loan">
                                                <div class="fileinput-new thumbnail img-raised" style="width: 250px;">
                                                <?   if(empty($loan['profile_img'])){ ?>
                                                            <img class="border-round" src="<? echo base_url().'assets/images/person.png' ?>" width="250"/>
                                                        <?}else{?>
                                                            <img class="img-fluid" width="250" id="output" src="<? echo base_url().'uploads/'.$loan['profile_img']; ?>" alt="client-img"  />
                                                        <?}?>
                                                </div>
                                            </div>

                                            <div class="col-md-8">
                                                <div class="row">
                                                    <div class="col-md-6 p-0">
                                                        <div class="form-group input-group-prepend">
                                                            <label class="bmd-label-floating text-primary">Account Number:</label>
                                                            <input type="text" class="form-control interest text-left font-weight-bold" value="<? echo $loan['account_no'];?>" disabled>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 p-0">
                                                        <div class="form-group input-group-prepend">
                                                            <label class="bmd-label-floating text-primary">Date Loan:</label>
                                                            <input type="text" class="form-control interest text-left font-weight-bold" value="<? $time = strtotime($loan['date_approved']); echo date("M. d, Y", $time);?>" disabled>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row p-0">
                                                    <div class="col-md-12 p-0">
                                                        <div class="form-group input-group-prepend">
                                                            <label class="bmd-label-floating text-primary">Client's Name</label>
                                                            <input type="text" class="form-control interest text-left font-weight-bold" value="<? echo $loan['firstname'].' '.$loan['middlename'].'. '.$loan['lastname'];?>" disabled>
                                                        </div>
                                                    </div>
                                                </div>
                                                 <div class="row p-0">
                                                    <div class="col-md-12 p-0">
                                                        <div class="form-group input-group-prepend">
                                                            <label class="bmd-label-floating text-primary">Current Address: </label>
                                                            <input type="text" class="form-control interest text-left font-weight-bold" value="Purok <? echo $loan['purok_no'].', '.$loan['barangay'].', '.$loan['city'].', '.$loan['province'].', '.$loan['country'].' '.$loan['postal_code'];?>" disabled>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row p-0">
                                                    <div class="col-md-6 p-0">
                                                        <div class="form-group input-group-prepend">
                                                            <label class="bmd-label-floating text-primary">Amount Loan:  </label>
                                                            <input type="text" class="form-control interest text-left font-weight-bold" value="<? echo $loan['loan_amount'];?>" disabled>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 p-0">
                                                        <div class="form-group input-group-prepend">
                                                            <label class="bmd-label-floating text-primary">Date Due: </label>
                                                            <input type="text" class="form-control interest text-left font-weight-bold" value="<? $due = $loan['due_date']; echo date('M. d, Y', strtotime($due));?>" disabled>
                                                        </div>
                                                    </div>     
                                                </div>
                                                 <div class="row p-0">
                                                    <div class="col-md-6 p-0">
                                                        <div class="form-group input-group-prepend">
                                                            <label class="bmd-label-floating text-primary">Daily Payment(P) : </label>
                                                            <input type="text" class="form-control interest text-left font-weight-bold" value="<? echo $loan['daily_payment'];?>" disabled>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 p-0">
                                                        <div class="form-group input-group-prepend">
                                                            <label class="bmd-label-floating text-primary">Terms(days): </label>
                                                            <input type="text" class="form-control interest text-left font-weight-bold" value="<? echo $loan['terms'];?> " disabled>
                                                        </div>
                                                    </div>     
                                                </div>                                                         
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row" style="margin-top: -40px">
                                    <div class="col-md-6">
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="table-responsive">
                                                    <table class="table table-sm">
                                                        <thead class="text-primary">
                                                            <th>No.</th>
                                                            <th>Date</th>
                                                            <th>Daily Amount</th>
                                                            <th>Collected by</th>
                                                            <th>Note</th>
                                                        </thead>
                                                        <tbody>
                                                           <? for ($i=0; $i<=29 ; $i++) {  
                                                            ?>
                                                            <tr>
                                                                <td><? echo $i+1;?></td>

                                                                <td>
                                                                    <? if(!empty($first_mnth[$i]['date'])){
                                                                        echo $first_mnth[$i]['date']; 
                                                                        }
                                                                    ?>    
                                                                </td>
                                                                <td>
                                                                    <? if(!empty($first_mnth[$i]['amount'])){
                                                                        echo 'P '.$first_mnth[$i]['amount']; 
                                                                        }
                                                                    ?>
                                                                </td>
                                                                <td>
                                                                    <? if(!empty($first_mnth[$i]['collected_by'])){
                                                                        echo $first_mnth[$i]['collected_by']; 
                                                                        }
                                                                    ?>
                                                                </td>
                                                                <td>
                                                                    <? if(!empty($first_mnth[$i]['notes'])){
                                                                        echo $first_mnth[$i]['notes']; 
                                                                        }
                                                                    ?>
                                                                </td>
                                                            </tr>
                                                           <? } ?>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                         <div class="card">
                                            <div class="card-body">
                                                <div class="table-responsive">
                                                    <table class="table table-sm">
                                                        <thead class="text-primary">
                                                            <th>No.</th>
                                                            <th>Date</th>
                                                            <th>Daily Amount</th>
                                                            <th>Collected by</th>
                                                            <th>Note</th>
                                                        </thead>
                                                        <tbody>
                                                            <? for ($i=0; $i<=29 ; $i++) {
                                                            ?>
                                                            <tr>
                                                                <td><? echo $i+1;?></td>

                                                                <td>
                                                                    <? if(!empty($second_mnth[$i]['date'])){
                                                                        echo $second_mnth[$i]['date']; 
                                                                        }
                                                                    ?>    
                                                                </td>
                                                                <td>
                                                                    <? if(!empty($second_mnth[$i]['amount'])){
                                                                        echo 'P '.$second_mnth[$i]['amount']; 
                                                                        }
                                                                    ?>
                                                                </td>
                                                                <td>
                                                                    <? if(!empty($second_mnth[$i]['collected_by'])){
                                                                        echo $second_mnth[$i]['collected_by']; 
                                                                        }
                                                                    ?>
                                                                </td>
                                                                <td>
                                                                    <? if(!empty($second_mnth[$i]['notes'])){
                                                                        echo $second_mnth[$i]['notes']; 
                                                                        }
                                                                    ?>
                                                                </td>
                                                            </tr>
                                                           <? } ?>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                 <!-- Modal  -->
                                        <div class="modal fade " id="payment-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
                                            <div class="modal-dialog modal-md" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title font-weight-bold" id="exampleModalLabel">Transactions</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="col-md-12">
                                                            <div class="row">
                                                                <div class="ml-auto mr-auto">
                                                                    <button class="btn btn-primary norm_payment">Payment</button>
                                                                    <button class="btn btn-primary add_penalty">Add Penalty</button>
                                                                    <?
                                                                    $due = new DateTime($loan['due_date']);
                                                                    $now = date('M d Y');
                                                                    if($due > $now){ ?>
                                                                        <button rel="tooltip" title="Applicable only if loan is in due date" class="btn btn-primary" disabled="">Due Date Penalty</button>
                                                                   <? }else{ ?>
                                                                    <button class="btn btn-primary">Due Date Penalty</button>
                                                                    <? } ?>
                                                                    
                                                                </div>    
                                                            </div>

                                                            <div class="form-group mt-4">
                                                                <label class="bmd-label-floating">Date Now</label>
                                                                <input type="text" class="form-control pl-3" value="<?php echo date('M. d, Y');?>" readonly>
                                                            </div>
                                                            <div class="form-group input-group-prepend">
                                                                <span class="input-group-text">
                                                                            ₱
                                                                </span>
                                                                <label class="bmd-label-floating">Daily Payment</label>
                                                                <input type="number" class="form-control pl-3 daily_payment" name="amount" value="<? echo $loan['daily_payment'];?>" readonly required>
                                                            </div>
                                                            <div class="form-group input-group-prepend pnalty" style="display: none;">
                                                                <span class="input-group-text">
                                                                            %
                                                                </span>
                                                                <label class="bmd-label-floating">Penalty Percentage</label>
                                                                <input type="number" class="form-control pl-3" name="amount" value="1" readonly required>
                                                            </div>
                                                            <div class="form-group input-group-prepend pnalty" style="display: none;">
                                                                <span class="input-group-text">
                                                                            ₱
                                                                </span>
                                                                <label class="bmd-label-floating">Total Payment</label>
                                                                <input type="number" class="form-control pl-3 total_pay" name="amount" value="<? echo $penalty;?>" readonly required>
                                                            </div>
                                                            <input type="hidden" class="form-control loan_no" value="<? echo $loan['loan_no'];?>">
                                                        </div>
                                                        <button type="button" class="btn btn-primary btn-round btn-sm ml-3 pay">Pay</button>
                                                        <button type="button" class="btn btn-primary btn-round btn-sm ml-3 pay-penalty pnalty" style="display: none">Pay</button>
                                                        
                                                    </div>

                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Close</button>
                                                    </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- End of modal -->
                            </div>
                        </div>
                    </div>
                </div>