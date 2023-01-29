import React, { Component } from 'react';
import { Link } from "react-router-dom";
import SelectSearch from 'react-select-search';
import Ripples from 'react-ripples';
import Sidebar from './Sidebar';
import HeaderBar from './headerBar';

export default class ComparePrice extends Component {
    constructor (props){
        super(props);
        
       this.url = window.location.origin+'/public';
        this.renderSwitch = this.renderSwitch.bind(this);
        
        this.state={
            compare_plans:[]
        }
}

componentDidMount() {
    
    let client_id = localStorage["calculate_client_id"];
    if (client_id) {
      let AppState = JSON.parse(client_id);
      
      var arr = [];
    arr[0] = this.props.location.state;
    arr[1] = AppState.client_id;
    
    
    
    axios.put(this.url+'/api/compare-plans/', arr)
      .then(res => {
        this.setState({compare_plans: res.data.data});
      });
      
    }
    
      
      $('a.printPage').click(function(){
           window.print();
           return false;
        });

}

renderSwitch(e)
{
    switch(e) {
    case 'Employee':
      return 'E';
    case 'Spouse':
        return 'S';
    case 'Dependent':
        return 'D';
    default:
      return 'foo';
  }
}

    render() {
        return (
            <div>

<div id="wrapper">
                <Sidebar/>

                <div className="d-flex flex-column" id="content-wrapper">

                <HeaderBar/>

<div className="container-fluid" id="container-wrapper">
        <div className="d-sm-flex align-items-center justify-content-between mb-4">
          <h1 className="h3 mb-0 text-gray-800">Compare Price</h1>
          <ol className="breadcrumb">
            <li className="breadcrumb-item"><a href="./">Home</a></li>
            <li className="breadcrumb-item active" aria-current="page">Compare Price</li>
          </ol>
        </div>
        <div className="table-col">
          <h4><b>Plan OverView</b></h4>
          <table className="table">
            <thead>
              <tr>
                <th>Name</th>
                {this.state.compare_plans.map(plan => (
            <th>
              {plan.plan_name}
            </th>
          ))}
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>Carrier</td>
                {this.state.compare_plans.map(plan => (
            <td>
              <img className="table-logos-img img-fluid" src={window.location.origin+'/public/images/'+plan.logo} />
            </td>
          ))}
                  
              </tr>
              <tr className="monthly-premium-col">
                <td>
                  Monthly Premium
                </td>
                {this.state.compare_plans.map(plan => (
            <td>
             ${plan.monthly_premium}
            </td>
          ))}
              </tr>
              <tr className="list-rate-col">
                <td>
                  List Rate
                </td>
                 {this.state.compare_plans.map(plan => (
            <td>
             {plan.employees.map(emp => (
             <span className="d-block">
                    <i className="fa fa-angle-double-right" />  
                     {this.renderSwitch(emp.member_type)}: {emp.f_name} {emp.l_name} - ${emp.pricing}
                  </span>
             ))}
            </td>
          ))}
              </tr>
              <tr className="planlevel-col">
                <td>
                  Plan Level (Metal: tier)
                </td>
                {this.state.compare_plans.map(plan => (
                <td>
                  Missing Info
                </td>
                ))}
              </tr>
              <tr className>
                <td>
                  Health Saving account Qualified
                </td>
                {this.state.compare_plans.map(plan => (
            <td>
              {plan.plan_details.hsa_compliant}
            </td>
          ))}
              </tr>
              <tr className>
                <td>
                  Summary of benefits and coverage (SBC)
                </td>
                {this.state.compare_plans.map(plan => (
                <td>
                  Missing Info
                </td>
                ))}
              </tr>
              <tr className>
                <td>
                  Formulary Link
                </td>
                {this.state.compare_plans.map(plan => (
                <td>
                  Missing Info
                </td>
                ))}
              </tr>
              <tr>
                <td>
                  Deductibles
                </td>
                 {this.state.compare_plans.map(plan => (
            <td>
            <h5>In Network</h5>
              <span>Individual: ${plan.deductible_in}</span><br/>
              <span>Family: ${plan.family_in}</span>
            <h5>Out Network</h5>
              <span>Individual: ${plan.deductible_out}</span><br/>
              <span>Family: ${plan.family_out}</span>
            </td>
          ))}
              </tr>
              <tr>
                <td>
                  Out of Pocket Max
                </td>
                 {this.state.compare_plans.map(plan => (
            <td>
            <h5>In Network</h5>
              <span>Individual: ${plan.max_individual_in}</span><br/>
              <span>Family: ${plan.max_family_in}</span>
            <h5>Out Network</h5>
              <span>Individual: ${plan.max_individual_out}</span><br/>
              <span>Family: ${plan.max_family_out}</span>
            </td>
          ))}
              </tr>
              <tr className="network-row">
                <td>
                  <b>Drugs</b>
                </td>
              </tr>
              <tr className="network-row">
                <td>
                  Generic Drugs
                </td>
                
                {this.state.compare_plans.map(plan => (
             <td>
                  <span className="first-span">
                    <span>{plan.plan_details.tier2}</span> 
                  </span>
                </td>
          ))}
          
              </tr>
              <tr className="network-row">
                <td>
                  Preffered Generic Drugs
                </td>
                {this.state.compare_plans.map(plan => (
                <td>
                  <span className="first-span">
                    <span className="second-span">{plan.plan_details.tier1}</span> 
                  </span>
                </td>
          ))}
 
              </tr>
              <tr className="network-row">
                <td>
                  Non Preffered Brand Drugs
                </td>
                {this.state.compare_plans.map(plan => (
                <td>
                  <span className="first-span">
                    <span className="second-span">{plan.plan_details.tier4}</span> 
                  </span>
                </td>
          ))}
              </tr>
              <tr className="network-row">
                <td>
                  Specialty Drugs
                </td>
                {this.state.compare_plans.map(plan => (
                <td>
                  <span className="first-span">
                    <span className="second-span">{plan.plan_details.tier5}</span> 
                  </span>
                </td>
          ))}
              </tr>
              
              <tr className="network-row">
                <td>
                  Preventive Care Services
                </td>
                {this.state.compare_plans.map(plan => (
                <td>
                  <span className="first-span">
                    <span className="second-span">{plan.plan_details.preventive_care_services}</span> 
                  </span>
                </td>
          ))}
 
              </tr>
              
              <tr className="network-row">
                <td>
                  Primary Care Office Visit
                </td>
                {this.state.compare_plans.map(plan => (
                <td>
                  <span className="first-span">
                    <span className="second-span">{plan.plan_details.primary_care_office_visit}</span> 
                  </span>
                </td>
          ))}
 
              </tr>
              
              <tr className="network-row">
                <td>
                  Specialist Care Office Visit
                </td>
                {this.state.compare_plans.map(plan => (
                <td>
                  <span className="first-span">
                    <span className="second-span">{plan.plan_details.specialist_care_office_visit}</span> 
                  </span>
                </td>
          ))}
 
              </tr>
              
              <tr className="network-row">
                <td>
                  Behavioral Health Visits
                </td>
                {this.state.compare_plans.map(plan => (
                <td>
                  <span className="first-span">
                    <span className="second-span">{plan.plan_details.behavioral_health_visits}</span> 
                  </span>
                </td>
          ))}
 
              </tr>
              
              <tr className="network-row">
                <td>
                  Urgent Care
                </td>
                {this.state.compare_plans.map(plan => (
                <td>
                  <span className="first-span">
                    <span className="second-span">{plan.plan_details.urgent_care}</span> 
                  </span>
                </td>
          ))}
 
              </tr>
              
              <tr className="network-row">
                <td>
                  Emergency Room
                </td>
                {this.state.compare_plans.map(plan => (
                <td>
                  <span className="first-span">
                    <span className="second-span">{plan.plan_details.emergency_room}</span> 
                  </span>
                </td>
          ))}
 
              </tr>
              
              <tr className="network-row">
                <td>
                  CT/PET/SCAN/MRI
                </td>
                {this.state.compare_plans.map(plan => (
                <td>
                  <span className="first-span">
                    <span className="second-span">{plan.plan_details.ct_pet_scan_mri}</span> 
                  </span>
                </td>
          ))}
 
              </tr>
              
              <tr className="network-row">
                <td>
                  X Rays
                </td>
                {this.state.compare_plans.map(plan => (
                <td>
                  <span className="first-span">
                    <span className="second-span">{plan.plan_details.x_rays}</span> 
                  </span>
                </td>
          ))}
 
              </tr>
              
              <tr className="network-row">
                <td>
                  Laboratory Tests
                </td>
                {this.state.compare_plans.map(plan => (
                <td>
                  <span className="first-span">
                    <span className="second-span">{plan.plan_details.laboratory_tests}</span> 
                  </span>
                </td>
          ))}
 
              </tr>
              
              <tr className="network-row">
                <td>
                 Outpatient Hospital
                </td>
                {this.state.compare_plans.map(plan => (
                <td>
                  <span className="first-span">
                    <span className="second-span">{plan.plan_details.outpatient_hospital}</span> 
                  </span>
                </td>
          ))}
 
              </tr>
              
              <tr className="network-row">
                <td>
                 Inpatient Hospital
                </td>
                {this.state.compare_plans.map(plan => (
                <td>
                  <span className="first-span">
                    <span className="second-span">{plan.plan_details.inpatient_hospital}</span> 
                  </span>
                </td>
          ))}
 
              </tr>
              
              <tr className="network-row">
                <td>
                 Chiropractic & Acupuncture
                </td>
                {this.state.compare_plans.map(plan => (
                <td>
                  <span className="first-span">
                    <span className="second-span">{plan.plan_details.chiropractic_and_acupuncture}</span> 
                  </span>
                </td>
          ))}
 
              </tr>
              
              <tr className="network-row">
                <td>
                 Rehabilitation Therapy
                </td>
                {this.state.compare_plans.map(plan => (
                <td>
                  <span className="first-span">
                    <span className="second-span">{plan.plan_details.rehabilitation_therapy}</span> 
                  </span>
                </td>
          ))}
 
              </tr>
            </tbody>
          </table>
          <div className="col-12 compare-btn">
            <a href="#" className="btn print-btn printPage"> Print</a>
            <Link to="/public/new-quote" className="btn print-btn"> Close</Link>
          </div>
        </div>
      </div>

      </div>

      </div>
      </div>
        )
    }
}
