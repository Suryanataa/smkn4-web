import Container from "@/Components/Container/Container";
import LandingLayout from "@/Layouts/LandingLayout";
import MadingLayout from "@/Layouts/MadingLayout";
import PostLayout from "@/Layouts/CardListLayout";
import { router } from "@inertiajs/react";
import React, { useState } from "react";
import { FaSearch } from "react-icons/fa";
import { FaFilter } from "react-icons/fa6";
import CardListLayout from "@/Layouts/CardListLayout";

function Prestasi(props) {
    const [showModal, setShowModal] = useState(false);
    const [search, setSearch] = useState("");
    console.log(props);
    const openModal = () => {
        setShowModal(true);
    };

    const closeModal = () => {
        setShowModal(false);
    };

    let handleSearch = (e) => {
        e.preventDefault();
        router.get(`${window.location.pathname}#post`, {
            search: search,
        });
    };
    return (
        <LandingLayout
            logo={props.sekolah.logo_sekolah}
            alamat={props.sekolah.alamat_sekolah}
            subnav={props.subNavbar}
            sosmed={props.footer.socialMedia}
        >
            <Container classname="my-10 md:my-16">
                <MadingLayout
                    title={props.mading.title}
                    listPost={props.mading.list}
                    href={props.mading.kategori}
                >
                    {props.post !== null ? (
                        <>
                            <h1 className="text-center uppercase text-primary text-[20px] xl:text-[24px] font-bold mb-4">
                                {window.location.pathname.split("/").length < 3
                                    ? `PRESTASI TERBARU`
                                    : `DETAIL PRESTASI`}
                            </h1>
                            <div className="flex flex-col gap-2 md:flex-row xl:flex-col md:gap-4">
                                <div className="relative md:w-1/2 xl:w-full">
                                    <img
                                        onClick={openModal}
                                        src={`${props.prestasi.gambar}`}
                                        alt="thumbnail post"
                                        className="max-h-[200px] w-full object-cover xl:max-h-[380px] cursor-zoom-in "
                                    />
                                    <div className="absolute top-0 right-0 px-4 py-2 xl:px-6 rounded-bl-2xl bg-primary text-secondary">
                                        {props.prestasi.kategori}
                                    </div>
                                </div>
                                <div className="flex flex-col">
                                    <h2 className="font-bold text-primary text-[18px] xl:text-[20px]">
                                        {props.prestasi.judul}
                                    </h2>
                                    <p className="text-[14px] font-semibold text-primary flex items-center gap-2">
                                        <span>
                                            Post by{" "}
                                            {props.prestasi.penulis.name}
                                        </span>
                                        {new Date(
                                            props.prestasi.created_at
                                        ).toLocaleDateString("id-ID")}
                                    </p>
                                    <figure className="mt-2 font-semibold text-primary">
                                        Peserta Lomba: {props.prestasi.pemenang}
                                    </figure>
                                    <p
                                        dangerouslySetInnerHTML={{
                                            __html: props.prestasi.konten,
                                        }}
                                        className="text-[14px] mt-1"
                                    ></p>
                                </div>
                            </div>
                        </>
                    ) : (
                        <div className="flex flex-col items-center justify-center">
                            <img
                                src={`/images/default/no-data-post.svg`}
                                alt="thumbnail post"
                                className="max-h-[380px] "
                            />
                            <h2 className="font-bold text-[20px] text-primary">
                                Belum ada Prestasi di upload
                            </h2>
                        </div>
                    )}
                </MadingLayout>
            </Container>

            <Container classname="my-12 md:mt-20" id="post">
                <div className="flex flex-wrap items-center justify-between gap-3 text-primary">
                    <h3 className="font-bold text-[16px] md:text-[20px] xl:text-[24px]">
                        Prestasi Lainnya
                    </h3>

                    <div className="flex items-center gap-2 md:gap-3">
                        <button className="p-2 border-2 rounded-md border-slate-300">
                            <FaFilter />
                        </button>

                        <form
                            onSubmit={handleSearch}
                            className="flex items-center border rounded-full md:pe-3 xl:pe-4 bg-primary border-slate-300"
                        >
                            <div className="relative flex items-center">
                                <input
                                    type="text"
                                    name="search"
                                    onChange={(e) => {
                                        setSearch(e.target.value);
                                    }}
                                    placeholder="Cari postingan..."
                                    className="w-full border rounded-full xl:px-5 border-slate-300"
                                />
                                <FaSearch className="absolute right-4" />
                            </div>
                            <button
                                type="submit"
                                className="px-4 py-2 text-white rounded-full xl:px-4 md:px-3 bg-primary"
                            >
                                Cari
                            </button>
                        </form>
                    </div>
                </div>
            </Container>

            <Container classname="my-10 md:mt-5 md:mb-16">
                <CardListLayout data={props.allPrestasi.data} type="prestasi" />
            </Container>

            {showModal && (
                <div className="fixed top-0 left-0 z-50 flex items-center justify-center w-full h-full">
                    <div
                        className="fixed top-0 left-0 w-full h-full opacity-75 modal-overlay"
                        onClick={closeModal}
                    ></div>
                    <div className="flex justify-center object-contain w-full p-4 bg-white rounded-lg shadow-lg modal-content">
                        <img
                            src={`${props.prestasi.gambar}`}
                            alt="Preview"
                            className="object-contain w-1/2 max-h-1/2 z-[55]"
                        />
                        <button
                            onClick={closeModal}
                            className="px-4 py-2 mt-2 text-white rounded-md bg-primary"
                        >
                            Tutup
                        </button>
                    </div>
                </div>
            )}
        </LandingLayout>
    );
}

export default Prestasi;
