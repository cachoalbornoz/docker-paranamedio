import { ref } from "vue"
import axios from "axios"


export default function useDataLoggers() {

    const lecturas = ref([])

    const getLecturas = async () => {

        const response = await axios.get('api/lecturas/get')
        lecturas.value = response.data.data
    }

    // setInterval(() => { getLecturas() }, 5000);

    return {
        lecturas, getLecturas
    }

}
