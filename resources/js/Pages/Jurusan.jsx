import Container from "@/Components/Container/Container";
import LandingLayout from "@/Layouts/LandingLayout";
import { IoIosArrowForward } from "react-icons/io";
import React from "react";
import { Link } from "@inertiajs/react";

function Jurusan(props) {
    console.log(props);
    return (
        <LandingLayout
            logo={props.sekolah.logo_sekolah}
            alamat={props.sekolah.alamat_sekolah}
            subnav={props.subNavbar}
            sosmed={props.footer.socialMedia}
        >
            <Container classname="mb-14">
                <h1 className="font-bold text-primary text-[18px] md:text-[24px] text-center mt-5 md:mt-10">
                    PROGRAM KEAHLIAN
                </h1>

                {props.jurusan.map((item, index) => (
                    <div
                        key={index}
                        className="flex flex-col items-center w-full gap-3 my-6 md:justify-start md:gap-5 xl:gap-8 md:flex-row md:odd:flex-row-reverse thumbnail"
                    >
                        <div className="overflow-hidden">
                            <img
                                src={item.gambar}
                                className="w-full md:w-[300px] xl:w-[400px] max-h-[166px] md:max-h-[200px] xl:max-h-[270px] object-cover thumbnail"
                                alt="gambar jurusan"
                            />
                        </div>
                        <div className="flex flex-col items-center gap-1 text-center md:text-start md:items-start text-primary">
                            <h2 className="font-bold text-[16px] md:text-[18px] xl:text-[20px]">
                                {item.nama}
                            </h2>
                            <p className="line-clamp-3">{item.deskripsi}</p>
                            <Link
                                className="flex items-center gap-2 font-semibold "
                                href={`/jurusan/${item.slug}`}
                            >
                                Lihat selengkapnya <IoIosArrowForward />
                            </Link>
                        </div>
                    </div>
                ))}
            </Container>
        </LandingLayout>
    );
}

export default Jurusan;