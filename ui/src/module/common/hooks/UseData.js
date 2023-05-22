import {useEffect, useState} from "react";
import axios from "axios";

export const useData = (url, params) => {
    const [state, setState] = useState(null);

    useEffect(() => {
        const dataFetch = async () => {
            const response = await axios.get(url, { params: params });
            setState(response.data);
        };

        dataFetch();
    }, [url]);

    return { data: state };
};