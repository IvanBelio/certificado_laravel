export default function Numero({numero}){
    //const numero = props.numero;

    return(
        <>
        <h1 className="text-green-300 text-4xl">EEEEstoy en número y quiero mostrar un valor</h1>
        <span className = "text-red">{numero}</span>
        </>
    )
}