import React, { Component } from 'react';
import SelectSearch from 'react-select-search';
import Ripples from 'react-ripples';
import Sidebar from './Sidebar';
import HeaderBar from './headerBar';
import { Link } from 'react-router-dom';
import TableRowPlans from './TableRowPlans';


export default class Calculate extends Component {
    constructor (props){
        super(props);
        
        this.url = window.location.origin+'/public';

        this.state = {
            clientid:'',
            calculated_client_id:'',
            clientname: '',
            no_of_employees:'',
            plans:[],
            compare_array:[]
        };
        
        this.comparePlans = this.comparePlans.bind(this);
        this.setCompareArray = this.setCompareArray.bind(this);
        this.popCompareArray = this.popCompareArray.bind(this);
        this.planTypeFilter = this.planTypeFilter.bind(this);
        this.backClick = this.backClick.bind(this);
}

componentDidMount() {
    let client_id = localStorage["calculate_client_id"];
    if (client_id) {
      let AppState = JSON.parse(client_id);
    axios.get(this.url+'/api/get-calculated-employees/'+AppState.client_id)
      .then(res => {
          if(res.data.data==1)
          {
             this.setState({
                clientid:res.data.client.id,
                clientname: res.data.client.name,
                no_of_employees:res.data.client.emp_count,
                plans:res.data.plans
             });
          }
          else if(res.data.data==0)
          {
              alert('No plans available for that zip!');
          }
          else if(res.data.data==2)
          {
              alert('No plans available for this year!');
          }
      })
      .catch((error) => {
        console.log(error);
      })
    }
    /*history.pushState(null, null, location.href);
    window.onpopstate = function () {
        history.go(1);
        alert('All your information will be lost.');
    };*/
  }
  
  backClick(ele)
  {
      
  }
  
  setCompareArray(ele)
  {
      this.state.compare_array.push(ele);
  }
  
  planTypeFilter(e)
  {
      let client_id = localStorage["calculate_client_id"];
    if (client_id) {
      let AppState = JSON.parse(client_id);
      const filter = {
      name: e.target.value,
      id: AppState.client_id
    }
    }
      axios.put(this.url+'/api/filter-plans/', filter)
      .then(res => {
        this.setState({plans: res.data.plans});
        console.log('state',this.state.plans);
      });
  }
  
  popCompareArray(ele)
  {
    var index = this.state.compare_array.indexOf(ele);
    if (index !== -1) {
        this.state.compare_array.splice(index, 1);
        this.setState({compare_array: this.state.compare_array});
    }
  }
  
  tabRow(){
       if(this.state.plans instanceof Array){

         return this.state.plans.map(function(object, i){
             return object.map(function(objj, j){
                 console.log('object',objj);
                 console.log('obj',objj['plan_details']);
             return <TableRowPlans obj={objj} key={j} index={j} setCompareArray={this.setCompareArray} popCompareArray={this.popCompareArray} />;
             }.bind(this))

         }.bind(this))
       }
       else
       {
           //console.log('fucked up');
       }
     }
     
     comparePlans()
     {
         this.props.history.push({
             pathname:'/public/compare-price',
             state:{array: this.state.compare_array}
         }); 
     }
    render() {
        return (
            <div>

            
<div id="wrapper">

<Sidebar/>

<div className="d-flex flex-column" id="container-wrapper" style={{width: "100%"}}>

<HeaderBar/>

<div className="container-fluid" id="container-wrapper">
        <div className="d-sm-flex align-items-center justify-content-between mb-4">
          <h1 className="h3 mb-0 text-gray-800">Power Generation </h1>
          <ol className="breadcrumb">
            <li className="breadcrumb-item"><a href="./">Home</a></li>
            <li className="breadcrumb-item active" aria-current="page">Power Generation</li>
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
                  <div className="col-md-12 mb-2 text-center">
                    <h3>{this.state.clientname}</h3>
                    <button className="btn btn-primary pull-right" onClick={this.comparePlans}>Compare</button>
                  </div>
                  <div className="col-md-3">
                    <div className="row">
                      <div className="col-md-12 mb-1">
                        <h5>{this.state.clientname}</h5>
                      </div>
                      <div className="col-md-12 mb-1">
                        <p>{this.state.no_of_employees} Employees</p>
                        <p># Dependents</p>
                        <p># Total Enrolled</p>
                      </div>
                      <div className="col-md-12 text-center mb-2">
                        <a className="btn btn-primary" href="">Change Census</a>
                      </div>
                      <div className="col-md-12">
                        <h6>Plan Type <span className="question-mark"><a href="#">?</a></span></h6>
                        <select className="form-control" onChange={this.planTypeFilter} defaultValue={'DEFAULT'}>
                          <option disabled value="DEFAULT">Choose Plan Type</option>
                          <option value="HMO">HMO</option>
                          <option value="PPO">PPO</option>
                        </select>
                        <h6 className="mt-2">Metal Level <span className="question-mark"><a href="#">?</a></span></h6>
                        <select className="form-control">
                          <option value="bronze">Bronze</option>
                          <option value="silver">Silver</option>
                          <option value="gold">Gold</option>
                          <option value="platinum">Platinum</option>
                        </select>
                      </div>
                    </div>
                  </div>
                  <div className="col-md-9">
                    {this.tabRow()}
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        {/*Row*/}
      </div>

      </div>

      </div>


      <div className="modal fade trueselectmodal" id="myModal">
        <div className="modal-dialog modal-dialog-centered ">
          <div className="modal-content">
            {/* Modal body */}
            <div className="modal-body">
              <button type="button" className="close" data-dismiss="modal">×</button>
              <span className="modal-img">
                <img className="img-fluid mx-auto" src="https://integrityinsurance.dev505.io/public/theme/img/newlogo.PNG" />
                <a href="#" className="btn btn-primary">True Select Bronze A</a>
              </span>
              <a href="#" className="btn true-select-btn"> Summary of Benefits <i className="fa fa-angle-right"  /></a>
              <a href="#" className="btn true-select-btn"> In-Network Provider <i className="fa fa-angle-right"  /></a>
              <a href="#" className="btn true-select-btn"> Prescription Formulary <i className="fa fa-angle-right"  /></a>
              <a href="#" className="btn true-select-btn"> Rates <i className="fa fa-angle-right"  /></a>
            </div>
            {/* Modal footer */}
            <div className="modal-footer">
              <button type="button" className="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
          </div>
        </div>
      </div>

      </div>

        )
    }
}