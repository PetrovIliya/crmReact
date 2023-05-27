import "./EditLeadPage.css"
import LeadForm from "../../components/lead_form/LeadForm";
import {useSearchParams} from "react-router-dom";
import {getFindLeadByLeadIdUrl, getUpdateLeadUrl} from "../../lib/LeadUrlProvider";
import {useData} from "../../../common/hooks/UseData";
import axios from "axios";
import React from 'react';

const EditLeadPage = props => {
    const [searchParams] = useSearchParams();
    const leadId = searchParams.get('lead_id');
    const { data: lead } = useData(getFindLeadByLeadIdUrl(), { lead_id: leadId });

    const onFormSubmit = async data => {
        await axios.post(getUpdateLeadUrl(), Object.assign({ lead_id: leadId }, data))
    }

    return (
        <div className="edit-lead-form-container">
            <LeadForm
                formValues={lead}
                formLabel="Edit Lead"
                onSubmit={onFormSubmit}
            />
            <div style={{marginTop: "100px"}}>Представте, что здесь вкладки с таблицами(notes, activity, logs)</div>
        </div>
    );
}

export default EditLeadPage