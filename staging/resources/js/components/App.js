import React from 'react';
import ReactDOM from 'react-dom';
import {BrowserRouter, Route, Switch} from 'react-router-dom';
import about from './about';
import home from './home';
import pricing from './pricing';
import login from './login';
import register from './register';
import Dashboard from './Dashboard';
import ProfileSetting from './ProfileSetting';
import Companies from './Companies';
import HealthcareProvider from './HealthcareProvider';
import ManagePlans from './ManagePlans';
import ComparePrice from './ComparePrice';
import NewQuote from './NewQuote';
import Clients from './Clients';
import Calculate from './Calculate';
import ForgotPassword from './ForgotPassword';

import DashboardHome from './NewDashboard/dashboardHome/DashboardHome';
import NewQuote2 from './NewDashboard/NewQuote/NewQuote';
   
function App() {
  return (
    <div className="App">
      <BrowserRouter>

        <Switch>
          <Route exact path="/staging/public" component={home}/>
          <Route  path="/staging/public/about" component={about}/>
          <Route  path="/staging/public/pricing" component={pricing}/>
          <Route  path="/staging/public/login" component={login}/>
          <Route  path="/staging/public/register" component={register}/>
          <Route  path="/staging/public/dashboard" component={Dashboard}/>
          <Route  path="/staging/public/companies" component={Companies}/>
          <Route  path="/staging/public/profile-setting" component={ProfileSetting}/>
          <Route  path="/staging/public/heath-care-providers" component={HealthcareProvider}/>
          <Route  path="/staging/public/manage-plans" component={ManagePlans}/>
          <Route  path="/staging/public/compare-price" component={ComparePrice}/>
          <Route  path="/staging/public/clients" component={Clients}/>
          <Route  path="/staging/public/new-quote/:id" component={NewQuote}/>
          <Route  path="/staging/public/calculate" component={Calculate}/>
          <Route path ="/staging/public/forgot-password" component={ForgotPassword}/>
          
          
          <Route  exact path="/staging/DashboardHome" component={DashboardHome}/>
          <Route  exact path="/staging/new-quote" component={NewQuote2}/> 
          
        </Switch>
      </BrowserRouter>
      
    </div>
  );
}

export default App;

ReactDOM.render(<App />, document.getElementById('app'))

