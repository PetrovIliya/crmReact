import "./NewLeadPage.css"
import React from 'react';
import LeadForm from "../../components/lead_form/LeadForm";
import axios from "axios";
import { useNavigate } from "react-router-dom";
import {getLeadCreateUrl} from "../../lib/LeadUrlProvider";

const NewLeadPage = props => {
    const navigate = useNavigate();

    const onFormSubmit = async jsonData => {
        const response = await axios.post(getLeadCreateUrl(), jsonData);
        navigate('/lead/edit?lead_id=' + response.data['lead_id'])
    }

    return (
        <div className="new_lead-lead-form-container">
            <LeadForm isNew={true} formLabel="Create New Lead" onSubmit={onFormSubmit}/>
        </div>
    );
}

export default NewLeadPage;