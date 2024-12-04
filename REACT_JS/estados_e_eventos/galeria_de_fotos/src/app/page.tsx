"use client"

import { Modal } from "@/components/Modal";
import { PhotoItem } from "@/components/PhotoItem";
import { photoList } from "@/data/photoList";
import { useState } from "react";

const Page = () => {
  const [showModal, setShowModal] = useState(false);    // state 'showModal' controla se modal vai aparecer ou não, já inciando como 'false' ou seja o modal não irar aparecer
  const [imageOfModal, setImageOfModal] =   useState('');   // state 'imageOfModal' guarda a imagem que apareçerá

  const openModal = (id: number) => {     // função 'openModal' é a responsável por abrir o modal, reçebendo como parâmetro o 'id' da foto que será exibida
    const photo = photoList.find(item => item.id === id);
    if(photo) {
      setImageOfModal(photo.url);
      setShowModal(true);
    }
  }

  return (
    <div className = "mx-2">
      <h1 className = "text-center text-3xl font-bold my-10">Fotos</h1>

      <section className = "container max-w-5xl mx-auto grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
        {photoList.map(item => {
          return (
            <PhotoItem
              key = {item.id}   // propriedade 'key' por causa do 'id'
              photo = {item}      // propriedade é a 'foto inteira'
              onClick = {() => openModal(item.id)}    // 'onClick' chama a função 'openModal' que abrir o modal e manda a 'foto inteira' que será exibida
            />
          );
        })}
      </section>

      {showModal &&
        <Modal image = {imageOfModal} closeModal = {closeModal} />
      }
    </div>
  );
}

export default Page;  