@extends('layout.master')
@section('container')
    <div class="container" style="margin-top:152px;">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">

                        You are log in!


                           <?php

                           $current=session('current');
                           echo $current['name']." Role is ".$current['role'];

                        ?>


                            ?>



                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
<div class="container text-center footer_style" style="">


@include('layout.footer')

</div>