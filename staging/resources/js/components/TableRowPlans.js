import React, { Component } from 'react';
import { Link } from 'react-router-dom';

class TableRowPlans extends Component {
  constructor(props) {
      super(props);
      this.url = 'http://integrityinsurance.dev505.io/public';
      this.onClickPlanComparison = this.onClickPlanComparison.bind(this);
      this.state={
            arr:[]
        }
      
  }
  onClickPlanComparison(e)
  {
        var checked = e.target.checked;
        if(checked==true)
        {
            this.props.setCompareArray(e.target.getAttribute('idvalue'));
        }
        else
        {
            this.props.popCompareArray(e.target.getAttribute('idvalue'));
        }
  }
  renderDeductibleField()
  {
      if(this.props.obj.plan_details[0]!=null)
      {
      return (
          <p>
          {`Deductible Individual ${this.props.obj.plan_details[0].deductible_individual_in_network}/${this.props.obj.plan_details[0].deductible_family_in_network} Deductible Individual Out Network ${this.props.obj.plan_details[0].deductible_individual_out_network}/${this.props.obj.plan_details[0].deductible_family_out_network}`}
          </p>
      );
      }
      else
      {
          return (
              <p>Missing Information</p>
              );
      }
  }
  
  renderPocketMaxField()
  {
      if(this.props.obj.plan_details[0]!=null)
      {
      return (
          <p>
          {`Out of Pocket Max ${this.props.obj.plan_details[0].out_of_pocket_max_individual_in_network}/${this.props.obj.plan_details[0].out_of_pocket_max_family_in_network} Out of Pocket Max Out Network ${this.props.obj.plan_details[0].out_of_pocket_max_individual_out_network}/${this.props.obj.plan_details[0].out_of_pocket_max_family_out_network}`}
          </p>
      );
      }
      else
      {
          return (
              <p>Missing Information</p>
              );
      }
  }
  render() {
    return (
        <div className="row mb-2">
            <div className="col-md-10" style={{border: '1px solid black'}}>
                <a href="#" className="model-open" data-toggle="modal" data-target="#myModal">
                <p style={{fontSize: '18px'}}>{this.props.obj.plan_name}</p>
                <div className="row">
                    <div className="col-md-3">
                        <img className="img-fluid" src={window.location.origin+'/public/images/'+this.props.obj.logo}/>
                    </div>
                    <div className="col-md-3">
                     {this.renderDeductibleField()} 
                    </div>
                    <div className="col-md-3">
                    {this.renderPocketMaxField()}
                    </div>
                    <div className="col-md-3">
                        <p>
                            <span style={{fontWeight: 'bold', color: 'red'}}>Monthly Premium</span><br />${this.props.obj.monthly_premium}
                        </p>
                    </div>
                </div>
                </a>
            </div>
            <div className="col-md-2">
            <input type="checkbox" onChange={this.onClickPlanComparison} idvalue={this.props.obj.id}/>
            </div>
        </div>
    );
  }
}

export default TableRowPlans;