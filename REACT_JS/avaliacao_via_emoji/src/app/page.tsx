import { EmojiRating } from "@/components/EmojiRating";

const Page = () => {

  return (
    <div className = "w-screen h-screen flex justify-center items-center">
      <EmojiRating rate = {9} />   {/* 'utilizando' componente EmojiRating e reçebendo 'props rate' */}
    </div>
  );
}

export default Page;