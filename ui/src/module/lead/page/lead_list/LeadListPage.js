import "./LeadListPage.css"
import React from 'react';
import {useData} from "../../../common/hooks/UseData";
import {getLeadListUrl, getUpdateLeadUrl} from "../../lib/LeadUrlProvider";
import {Table} from "../../../common/components/table/Table";

const LeadListPage = props => {
    const {data: leads} = useData(getLeadListUrl())

    const addEditUrlToEveryLead = leads => {
        leads.map(lead => {
            lead['updateLeadUrl'] = '/lead/edit?lead_id=' + lead['leadId'];
        })
    }

    if (leads)
    {
        addEditUrlToEveryLead(leads)
    }

    const columns = [
        {title: 'First Name', dataIndex: 'firstName',},
        {title: 'Last Name', dataIndex: 'lastName',},
        {title: 'Email', dataIndex: 'email', type: 'link', urlIndex: 'updateLeadUrl'},
        {title: 'Phone', dataIndex: 'phone'},
        {title: 'Product', dataIndex: 'product'},
        {title: 'Source', dataIndex: 'source'},
        {title: 'Company Name', dataIndex: 'companyName'},
        {title: 'Job Title', dataIndex: 'jobTitle'},
        {title: 'City', dataIndex: 'city'},
        {title: 'Country', dataIndex: 'country'},
        {title: 'State', dataIndex: 'state'},
        {title: 'Address', dataIndex: 'address'},
        {title: 'Source Description', dataIndex: 'sourceDescription'},
        {title: 'Department', dataIndex: 'department'},
        {title: 'Post Code', dataIndex: 'postCode'}
    ];

    return (
        <>
            <div style={{height: '400px', display: 'flex', alignItems: 'center', justifyContent: 'center'}}>Представте, что здесь форма поиска</div>
            <Table
                columns={columns}
                data={leads}
            />
        </>
    );
}

export default LeadListPage