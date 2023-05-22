import "./EditLeadPage.css"
import LeadForm from "../../components/lead_form/LeadForm";
import {useSearchParams} from "react-router-dom";
import {getFindLeadByLeadIdUrl} from "../../lib/LeadUrlProvider";
import {useData} from "../../../common/hooks/UseData";

const EditLeadPage = props => {
    const [searchParams] = useSearchParams();
    const { data: lead } = useData(getFindLeadByLeadIdUrl(), { lead_id: searchParams.get('lead_id') });

    const onFormSubmit = data => {

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