import { StudentTable } from "@/components/StudentTable";
import { students } from "@/data/students";

const Page = () => {

  return (
    <div className = "container mx-auto">   {/* 'container' deixa espaçado e 'mx-auto' deixa no meio da tela */}
      <h1 className = "text-5xl mb-5">Lista de estudantes...</h1>
      <StudentTable students = {students} />    {/* passando a fonte de dados 'students.ts' para o componente 'StudentTable' e imprimindo na tela */}
    </div>
  );
}

export default Page;