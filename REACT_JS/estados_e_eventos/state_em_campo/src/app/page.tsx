"use client"

import { useState } from 'react';

const Page = () => {  
  const  handleBtnClick = () => {

  }

  return (
    <div className = "w-screen h-screen flex flex-col justify-center items-center text-3xl">
      <input type="text" className = "border border-black p-3 text-xl text-black rounded" />
      <button className = "handleBtnClick">Mostrar valor do campo</button>
    </div>
  );

}

export default Page;