
@extends('layouts.app')
@include('layouts.error')

<?php
/**
 * Created by PhpStorm.
 * User: Rasha
 * Date: 5/10/2017
 * Time: 2:04 PM
 */
?>
@section('content')

    <h1 class="page-heading"><i class="fa fa-address-card" aria-hidden="true"></i> Add Patient </h1>
    
    
    
 <form class="form-horizontal patient" method="post" action="">
      
        <div class="row">
            <div class="form-group col-md-6">
                <label for="name" class="control-label col-md-3">Name Patient </label>
                <div class="col-md-9">

                    <input type="text" class="form-control" id="name" name="name" value=""/>

                </div>
            </div>
<div class="form-group col-md-6">
                <label for="mobile" class="control-label col-md-3">Corporation </label>
                <div class="col-md-9">

                    <input type="text" class="form-control"> 

                </div>
            </div>
            

        </div>


        <div class="row">
           
           <div class="form-group col-md-6">
                <label for="mobile" class="control-label col-md-3">Birth Date </label>
                <div class="col-md-9">

                    <input type="text" class="form-control" id="datepicker"> 

                </div>
            </div>
            
            <div class="form-group col-md-6">
                <label for="specialty" class="control-label col-md-3"> Occupation</label>
                <div class="col-md-9">
                    
 <input type="text" class="form-control" id="Occupation" name="Occupation" value=""/>
                </div>
            </div>

           
        </div>

        <div class="row">
           
            <div class="form-group col-md-6">
                <label for="telephone" class="control-label col-md-3">Address: </label>
                <div class="col-md-9">
                    <input type="text" class="form-control" id="Address" name="Address"
                           value=""/>

                </div>
            </div>
            <div class="form-group col-md-6">
                <label for="address" class="control-label col-md-3">Nationality: </label>
                <div class="col-md-9">

                    <input type="text" class="form-control" id="address" name="address" value=""/>

                </div>
            </div>
            
            
            
            
        </div>
        <div class="row">
           

            
            <div class="form-group col-md-6">
              
                    <label for="salary" class="control-label col-md-3">Telephone : </label>
                    <div class="col-md-9">

                        <input type="text" class="form-control" id="Telephone" name="Telephone" value=""/>

                    </div>
                
            </div>


            <div class="form-group col-md-6">
                <label for="percent" class="control-label col-md-3">Mobile : </label>
                <div class="col-md-9">

                    <input type="text" class="form-control" id="Mobile" name="Mobile" value=""/>

                </div>
            </div>
            
<div class="content row">
    
    
</div>

<div class="clearfix"></div>
            <div class="form-group formButtons">


                <button type="submit" class="btn btn-primary"><i class="fa fa-backward"></i>
                    <span>Save</span></button>

                <a href="/patient" class=" btn btn-primary">Cancel</a>

            </div>
        </div>
    </form>



@endsection