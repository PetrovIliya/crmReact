import './App.css';
import NewLeadPage from "./module/lead/page/new_lead/NewLeadPage";
import {BrowserRouter, Route, Routes} from "react-router-dom";
import HealthCheck from "./module/common/components/health_check/HealthCheck";
import EditLeadPage from "./module/lead/page/edit_lead/EditLeadPage";
import LeadListPage from "./module/lead/page/lead_list/LeadListPage";
import React from 'react';
import {Navigation} from "./module/common/components/navbigation/Navigation";

const App = () => {
    return (
        <div className={"app-container"}>
            <BrowserRouter>
                <Navigation />
                <Routes>
                    <Route index element={<HealthCheck />} />
                    <Route path="lead/new" element={<NewLeadPage />} />
                    <Route path="lead/edit" element={<EditLeadPage />} />
                    <Route path="lead/list" element={<LeadListPage />} />
                    <Route path="*" element={<HealthCheck />} />
                </Routes>
            </BrowserRouter>
        </div>
    );
}

export default App;