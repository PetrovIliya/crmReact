import "./NewLead.css"
import React from 'react';
import LeadForm from "../../components/lead_form/LeadForm";
import axios from "axios";
import getLeadCreateUrl from "../../lib/LeadUrlProvider";

const NewLeadPage = props => {

    const onFormSubmit = async jsonData => {
        const response = await axios.post(getLeadCreateUrl(), jsonData);
    }

    return (
        <div className="new_lead-lead-form-container">
            <LeadForm isNew={true} formInitialValues={{status : "Opened"}} formLabel="Create New Lead" onSubmit={onFormSubmit}/>
        </div>
    );
}

export default NewLeadPage;