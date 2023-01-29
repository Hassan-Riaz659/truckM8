import React, { Component } from 'react';
import SelectSearch from 'react-select-search';
import Ripples from 'react-ripples';
import Sidebar from './Sidebar';
import HeaderBar from './headerBar';
import $ from 'jquery';
import axios from 'axios';
import SweetAlert from 'react-bootstrap-sweetalert';

var currentTab = 0;

var emp_data = 0; 

var popup_flag = 0;

const Row = ({ id }) => (
        <tr className="no-border" data-row-id={`${id}`}>
                                <td>
                                  <select className="form-control" name="member_type" id={`member_type${id}`}>
                                    <option value="Employee">Employee</option>
                                    <option value="Spouse">Spouse</option>
                                    <option value="Dependent">Dependent</option>
                                  </select>
                                </td>
                                <td><input className="input" type="text" name="f_name" className="form-control" id={`f_name${id}`}/></td>
                                <td><input className="input" type="text" name="l_name" className="form-control" id={`l_name${id}`}/></td>
                                <td>
                                
                                
                                
                                <input className="input" onChange={(e)=>{
                                    this.setState({
                                        dob:e.target.value
                                    })
                                }} type="date" name="dob" className="form-control" id={`dob${id}`} />
                                
                                </td>
                                
                                
                                <td><input className="input" type="number" name="age" className="form-control" id={`age${id}`}/></td>
                              </tr>
                    
);

export default class NewQuote extends Component {
    constructor (props){
        super(props);
        
        this.url = window.location.origin+'/public';
        
        this.state={
            effective_date:"10-10-2020",
            age:[],
            name:'',
            zip:'',
            date:'',
            client_id:'',
            isEnable:false,
            data:[]
        }
        this.nextPrev=this.nextPrev.bind(this);
        this.validateForm=this.validateForm.bind(this);
        this.onBlurClientName = this.onBlurClientName.bind(this);
        this.handleChange1 = this.handleChange1.bind(this);
        this.handleChange2 = this.handleChange2.bind(this);
        this.handleChange3 = this.handleChange3.bind(this);
        this.addClientInformation = this.addClientInformation.bind(this);
        this.addEmpInformation = this.addEmpInformation.bind(this);
        this.deleteAllEmpData = this.deleteAllEmpData.bind(this);
        this.calculateEstimate = this.calculateEstimate.bind(this);
        this.inputCheck = this.inputCheck.bind(this);
        this.appendChild = this.appendChild.bind(this);
        
}

componentDidMount () {
               var currentTab = 0;   // Current tab is set to be the first tab (0)
            this.showTab(currentTab); // Display the current tab
            
            
            
            $(function(){
    var dtToday = new Date();
    
    var month = dtToday.getMonth() + 1;
    var day = dtToday.getDate();
    var year = dtToday.getFullYear();
    if(month < 10)
        month = '0' + month.toString();
    if(day < 10)
        day = '0' + day.toString();
    
    var minDate= year + '-' + month + '-' + day;
    
    $('#txtDate').attr('min', minDate);
});

/*history.pushState(null, null, location.href);
    window.onpopstate = function () {
        history.go(1);
        if(popup_flag==0)
        {
            alert('All your information will be lost.');
            popup_flag=1;
        }
    };*/
    
//     window.onpopstate = function(event) {
//     window.location.reload();
// };

}

inputCheck(e)
{
    console.log('tks');
    /* pick last row of table */
    var count = $('#employee_data_table tr:last').attr('data-row-id');
    var type = $('#member_type'+count).val();
    var fname = $('#f_name'+count).val();
    var lname = $('#l_name'+count).val();
    var age = $('#age'+count).val();
    
    if(type!=''&&fname!=''&&lname!=''&&age!='')
    {
        this.setState({
            isEnable: false
        });
    }
    else
    {
        this.setState({
            isEnable: true
        });
    }
}

onBlurClientName(e)
{
    axios.get(this.url+'/api/check-existing-client/'+ this.state.name)
      .then(res => {
        if(res['status']==true)
        {
            alert('Already exist!');
        }
      })
      .catch((error) => {
        console.log(error);
      })
}

addClientInformation(e)
{
    const client = {
    userid:this.props.match.params.id,
      name: this.state.name,
      zip: this.state.zip,
      date: this.state.date
    }
    
    axios.put(this.url+'/api/add-client/', client)
      .then(res => this.setState({client_id: res.data.data})
      );
        /*Swal.fire(
      'Good job!',
      'Expense Added Successfully',
      'success'
    )*/
}

addEmpInformation(e)
{
    var count = emp_data - 1;
    var type = $('#member_type'+count).val();
    var fname = $('#f_name'+count).val();
    var lname = $('#l_name'+count).val();
    var dob = $('#dob'+count).val();
    if(dob!='')
    {
        var dobb = new Date(dob);
        var today = new Date();
        var age = Math.floor((today-dobb) / (365.25 * 24 * 60 * 60 * 1000));
        var exact_age = $('#age'+count).val(age);
    }
    var age = $('#age'+count).val();

    if(type==''||fname==''||lname==''||age=='')
    {
        alert('Please fill all the fields!');
        return false;
    }
    
    const employee = {
      id:this.state.client_id,
      type: type,
      fname: fname,
      lname: lname,
      dob:dob,
      age:age
    }
    
    axios.put(this.url+'/api/add-employee/', employee)
      .then(res => console.log('success')
      );
      return true;
}

deleteAllEmpData(e)
{
    
}

handleChange1(e){
    this.setState({
      name: e.target.value
    })
}

handleChange2(e){
    if(e.target.value.length > 5)
    {
         $("#nextBtn").prop('disabled', true);
         $("#zip_msg").attr("hidden",false);
    }else{
        $("#nextBtn").prop('disabled', false);
        $("#zip_msg").attr("hidden",true);
    }
    this.setState({
      zip: e.target.value
    })
}

handleChange3(e){
    this.setState({
      date: e.target.value
    })
}

appendChild(e){
    var flag = true;
    if(emp_data!=0)
    {
        flag = this.addEmpInformation();
    }
    
    
    if(flag==true)
    {
    let data = this.state.data;
    data.push(data.length); // data.length is one more than actual length since array starts from 0.
    // Every time you call append row it adds new element to this array. 
    // You can also add objects here and use that to create row if you want.
    this.setState({
      data: data
    });
        emp_data = emp_data + 1;
    }
  };

calculateEstimate(e)
{
    var count = emp_data - 1;
    var type = $('#member_type'+count).val();
    var fname = $('#f_name'+count).val();
    var lname = $('#l_name'+count).val();
    var dob = $('#dob'+count).val();
    if(dob!='')
    {
        var dobb = new Date(dob);
        var today = new Date();
        var age = Math.floor((today-dobb) / (365.25 * 24 * 60 * 60 * 1000));
        var exact_age = $('#age'+count).val(age);
    }
    var age = $('#age'+count).val();
    
    
    if(type==''||fname==''||lname==''||age=='')
    {
        alert('Please fill all the fields!');
        return false;
    }
    
    const employee = {
      id:this.state.client_id,
      type: type,
      fname: fname,
      lname: lname,
      dob:dob,
      age:age
    }
    
    axios.put(this.url+'/api/add-employee/', employee).then((response) => {
        let client_id = {
                 client_id: this.state.client_id,
               };
            localStorage["calculate_client_id"] = JSON.stringify(client_id);
        this.props.history.push('/public/calculate')
    });
}

             nextPrev(n) {

              // This function will figure out which tab to display
              var x = document.getElementsByClassName("tab");
              // Exit the function if any field in the current tab is invalid:
              if (n == 1 && !this.validateForm()) return false;
              // Hide the current tab:
              x[currentTab].style.display = "none";
              // Increase or decrease the current tab by 1:
              currentTab = currentTab + n;
              console.log('tab',currentTab);
              console.log('x length',x.length);
              // if you have reached the end of the form... :
              if (currentTab >= x.length) {
                //...the form gets submitted:
                document.getElementById("regForm").submit();
                return false;
              }
              // Otherwise, display the correct tab:
              this.showTab(currentTab);
            }
            
            addAge(e,index)
            {
                var ageArray=this.state.age;
                ageArray[index]=e.target.value;
                this.setState({age:ageArray},()=>console.log(this.state.age))
            }
            
            
           addRow()
            {
                {this.addEmpInformation()}  
                var length="";
                length=this.state.age.length;
                var html='';
                emp_data = emp_data + 1;
                html+='<tr class="no-border" data-row-id="'+emp_data+'"><td><select class="form-control" name="member_type" id="member_type'+emp_data+'" onChange="inputCheck(this);"><option value="Employee">Employee</option><option value="Spouse">Spouse</option><option value="Dependent">Dependent</option></select></td><td><input type="text" name="f_name" class="form-control" id="f_name'+emp_data+'" onChange="inputCheck(this);"></td><td><input type="text" name="l_name" class="form-control" id="l_name'+emp_data+'" onChange="inputCheck(this);"></td><td><input type="date" name="dob" class="form-control" id="dob'+emp_data+'"></td><td><input type="number" name="age" class="form-control" id="age'+emp_data+'" onChange="inputCheck(this);"/></tr>';
                $("#add_row").append(html);
                this.setState({
                    isEnable: true
                });
            }
            
             resetTable()
            {
                {this.deleteAllEmpData()} 
                $("#add_row tr").next().remove();
            }
            
             showTab(n) {
                 console.log('new n',n);
              // This function will display the specified tab of the form ...
              var x = document.getElementsByClassName("tab");
              x[n].style.display = "block";
              // ... and fix the Previous/Next buttons:
              if (n == 0) {
                document.getElementById("prevBtn").style.display = "none";
              } else {
                document.getElementById("prevBtn").style.display = "inline";
              }
              if (n == (x.length - 1)) {
                  console.log('n',n);
                  console.log('aa',x.length);
                document.getElementById("nextBtn").innerHTML = "Calculate";
              } else {
                  console.log('nn',n);
                  console.log('aaaa',x.length);
                document.getElementById("nextBtn").innerHTML = "Next";
              }
              // ... and run a function that displays the correct step indicator:
              this.fixStepIndicator(n)
            }
            
            
             validateForm() {
              // This function deals with validation of the form fields
              var x, y, i, valid = true;
              x = document.getElementsByClassName("tab");
              var flag = $(x[0]).hasClass("tab1");
              y = x[currentTab].getElementsByTagName("input");
              // A loop that checks every input field in the current tab:
              for (i = 0; i < y.length; i++) {
                // If a field is empty...
                if (y[i].value == "") {
                  // add an "invalid" class to the field:
                  y[i].className += " invalid";
                  // and set the current valid status to false:
                  valid = false;
                }
                else if(y[i].id=='zip_codes' && y[i].value.length<5)
                {
                    // add an "invalid" class to the field:
                  y[i].className += " invalid";
                  // and set the current valid status to false:
                  valid = false;
                }
              }
              if(flag==true)
              {
                  {this.addClientInformation()}   
              }
              // If the valid status is true, mark the step as finished and valid:
              if (valid) {
                document.getElementsByClassName("step")[currentTab].className += " finish";
              }
              return valid; // return the valid status
            }
            
             fixStepIndicator(n) {
              // This function removes the "active" class of all steps...
              var i, x = document.getElementsByClassName("step");
              for (i = 0; i < x.length; i++) {
                x[i].className = x[i].className.replace(" active", "");
              }
              //... and adds the "active" class to the current step:
              x[n].className += " active";
            }


    render() {
        
        
        
        
        return (
            <div>

            <div id="wrapper">

                <Sidebar/>

                <div className="d-flex flex-column" id="container-wrapper" style={{width: "100%"}}>

                <HeaderBar/>

                <form id="regForm" method="Post" action="">
                {/* Container Fluid*/}
          <div className="tab tab1">
            <div className="container-fluid" id="container-wrapper">
              <div className="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 className="h3 mb-0 text-gray-800">Quote for Power Generation</h1>
                <ol className="breadcrumb">
                  <li className="breadcrumb-item"><a href="./">Home</a></li>
                  <li className="breadcrumb-item active" aria-current="page">New Quote</li>
                </ol>
              </div>
              <div className="row mb-3">
                <div className="col-lg-12">
                  {/* Form Basic */}
                  <div className="card mb-12">
                    <div className="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                      <h6 className="m-0 font-weight-bold text-primary">New Group Information</h6>
                    </div>
                    <div className="card-body">
                      <div className="form-group">
                        <label htmlFor="exampleInputEmail1">Client Name</label>
                        <input className="input" type="text" className="form-control" name="name" placeholder="Enter Client Name" onChange={this.handleChange1} required onBlur={this.onBlurClientName} />
                      </div>
                      <div className="form-group">
                        <label htmlFor="zip_codes">ZIP Code:</label>
                        <input className="input" type="number" className="form-control" name="name" placeholder="Enter ZIP" onChange={this.handleChange2} required id="zip_codes" />
                        <span id="zip_msg" hidden>Max limit for zip code is 5 digits</span>
                      </div>
                      <div className="form-group">
                        <label htmlFor="exampleInputEmail1">Effective Date</label>
                        <input className="input" id="txtDate"  type="date" className="form-control" onChange={this.handleChange3} name="effective_date" placeholder="Enter your effective date" required />
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              {/*Row*/}
            </div>
          </div>
          <div className="tab tab2">
            <div className="container-fluid" id="container-wrapper">
              <div className="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 className="h3 mb-0 text-gray-800">Census</h1>
                <ol className="breadcrumb">
                  <li className="breadcrumb-item"><a href="./">Home</a></li>
                  <li className="breadcrumb-item active" aria-current="page">Census</li>
                </ol>
              </div>
              <div className="row mb-3">
                <div className="col-lg-12">
                  {/* Form Basic */}
                  <div className="card mb-12">
                    <div className="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                      <h6 className="m-0 font-weight-bold text-primary">Census</h6>
                    </div>
                    <div className="card-body">
                      <div className="row">
                        <div className="col-md-12 table-responsive">
                          <table className="table table-bordered" id="employee_data_table">
                            <thead>
                              <tr>
                                <th>Member Type</th>
                                <th>First Name</th>
                                <th>Last Name</th>
                                <th>DOB</th>
                                <th>Age</th>
                              </tr>
                            </thead>
                            <tbody id="add_row">
                            {this.state.data.map(id => (
                                <Row id = {id} />
                            ))}
                            </tbody>
                          </table>
                        </div>
                        <div className="col-md-4 mt-2">
                          <button type="button" onClick={()=>this.appendChild ()} className="btn btn-primary" disabled = {this.state.isEnable} >Add Row</button>
                             
                        </div>
                        <div className="col-md-4 mt-2 text-center">
                          {/*    <a class="btn btn-primary" href="https://integrityinsurance.dev505.io/public/calculate-census">Calculate</a>*/}
                        </div>
                        <div className="col-md-4 mt-2">
                          <button type="button" onClick={()=>this.resetTable()} className="btn btn-primary pull-right">Reset Table</button>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              {/*Row*/}
            </div>
          </div>
        </form>
        <div style={{overflow: 'auto',padding: '0px 16px'}}>
          <div style={{float: 'right'}}>
            <button type="button" className="btn btn-primary prevbtn" id="prevBtn" onClick={()=>this.nextPrev(-1)}>Previous</button>
            <button type="button" className="btn btn-primary" id="nextBtn" onClick={()=>{
                if(document.getElementById("nextBtn").innerHTML == "Calculate")
                {
                    {this.calculateEstimate()}
                    return
                }
                this.nextPrev(1)
            }}>Next</button>
          </div>
        </div>
        <div style={{textAlign: 'center', marginTop: '40px'}}>
          <span className="step" />
          <span className="step" />
        </div>
      </div>

        

      </div>

      </div>
      
    
        )
    }
}
