import './Table.css'
import React from "react";
import {Table as BootstrapTable} from "react-bootstrap"
import {Link} from "react-router-dom";



/** @param {{
 * columns: Array<{
 *     title: string,
 *     dataIndex: number,
 *     type: string|null,
 *     urlIndex: string|null
 * }>,
 * row: Object,
 * }} props */
const TableRow = props => {
    return (
        <tr>
            {props.columns && props.columns.map( (column, index) =>
                <td className={'table-content-cell'} key={index}>
                    {column.type !== 'link' ?
                        props.row[column.dataIndex]
                        : <Link to={props.row[column.urlIndex]}>{props.row[column.dataIndex]}</Link>
                    }
                </td>
            )}
        </tr>
    )
}

/** @param {{
 * columns: Array<{
 *     title: string,
 *     dataIndex: number,
 *     type: string|null,
 *     urlIndex: string|null
 * }>,
 * data: Array<Object>
 * }} props */
export const Table = props => {

    if (!props.columns || !props.columns.length) {
        return (
          <div className="warning-msg">No columns</div>
        );
    }

    return (
        <div className={"table-container"}>
            {props.data && props.data.length ?
                <BootstrapTable striped bordered hover>
                    <thead>
                    <tr>
                        {props.columns && props.columns.map( column =>
                            <th key={column.title} className={'table-header-cell'}>{column.title}</th>
                        )}
                    </tr>
                    </thead>
                    <tbody>
                    {props.data && props.data.map( (row, index) =>
                        <TableRow
                            columns={props.columns}
                            row={row}
                            key={index}
                        />
                    )}
                    </tbody>
                </BootstrapTable>
                : <div className='warning-msg'>No Data</div>
            }

        </div>
    )
}