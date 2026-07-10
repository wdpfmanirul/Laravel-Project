<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Division;
use App\Models\District;
use App\Models\Upazila;

class LocationSeeder extends Seeder
{
    public function run()
    {
        $locations = [
            'Dhaka' => [
                'Dhaka' => ['Dhamrai', 'Dohar', 'Keraniganj', 'Nawabganj', 'Savar'],
                'Faridpur' => ['Alfadanga', 'Bhanga', 'Boalmari', 'Charbhadrasan', 'Faridpur Sadar', 'Madhukhali', 'Nagarkanda', 'Sadarpur', 'Saltha'],
                'Gazipur' => ['Gazipur Sadar', 'Kaliakair', 'Kaliganj', 'Kapasia', 'Sreepur'],
                'Gopalganj' => ['Gopalganj Sadar', 'Kashiani', 'Kotalipara', 'Muksudpur', 'Tungipara'],
                'Kishoreganj' => ['Austagram', 'Bajitpur', 'Bhairab', 'Hossainpur', 'Itna', 'Karimganj', 'Katiadi', 'Kishoreganj Sadar', 'Kuliarchar', 'Mithamoin', 'Nikli', 'Pakundia', 'Tarail'],
                'Madaripur' => ['Kalkini', 'Madaripur Sadar', 'Rajoir', 'Shibchar', 'Dasar'],
                'Manikganj' => ['Daulatpur', 'Ghior', 'Harirampur', 'Manikganj Sadar', 'Saturia', 'Shibalaya', 'Singair'],
                'Munshiganj' => ['Gazaria', 'Lohajang', 'Munshiganj Sadar', 'Sirajdikhan', 'Sreenagar', 'Tongibari'],
                'Narayanganj' => ['Araihazar', 'Sonargaon', 'Narayanganj Sadar', 'Rupganj', 'Bandar'],
                'Narsingdi' => ['Belabo', 'Monohardi', 'Narsingdi Sadar', 'Palash', 'Raipura', 'Shibpur'],
                'Rajbari' => ['Baliakandi', 'Goalandaphor', 'Kalukhali', 'Pangsha', 'Rajbari Sadar'],
                'Shariatpur' => ['Bhedarganj', 'Damudya', 'Gosairhat', 'Naria', 'Shariatpur Sadar', 'Zajira'],
                'Tangail' => ['Basail', 'Bhuanpur', 'Delduar', 'Dhanbari', 'Ghatail', 'Gopalpur', 'Kalihati', 'Madhupur', 'Mirzapur', 'Nagarpur', 'Sakhipur', 'Tangail Sadar'],
            ],
            'Khulna' => [
                'Bagerhat' => ['Chitalmari', 'Fakirhat', 'Kachua', 'Mollahat', 'Mongla', 'Morelganj', 'Rampal', 'Sarankhola', 'Bagerhat Sadar'],
                'Chuadanga' => ['Alamdanga', 'Chuadanga Sadar', 'Damurhuda', 'Jibannagar'],
                'Jessore' => ['Abhaynagar', 'Bagherpara', 'Chougachha', 'Jhikargachha', 'Keshabpur', 'Jessore Sadar', 'Manirampur', 'Sharsha'],
                'Jhenaidah' => ['Harinakundu', 'Jhenaidah Sadar', 'Kaliganj', 'Kotchandpur', 'Moheshpur', 'Shailkupa'],
                'Khulna' => ['Batiaghata', 'Dacope', 'Dumuria', 'Koyra', 'Paikgachha', 'Phultala', 'Rupsha', 'Terokhada', 'Dighalia'],
                'Kushtia' => ['Bheramara', 'Daulatpur', 'Khoksa', 'Kumarkhali', 'Kushtia Sadar', 'Mirpur'],
                'Magura' => ['Magura Sadar', 'Mohammadpur', 'Shalikha', 'Sreepur'],
                'Meherpur' => ['Gangni', 'Mujibnagar', 'Meherpur Sadar'],
                'Narail' => ['Kalia', 'Lohagara', 'Narail Sadar'],
                'Satkhira' => ['Assasuni', 'Debhata', 'Kalaroa', 'Kaliganj', 'Satkhira Sadar', 'Shyamnagar', 'Tala'],
            ],
            'Chittagong' => [
                'Bandarban' => ['Alikadam', 'Bandarban Sadar', 'Lama', 'Naikhongchhari', 'Rowangchhari', 'Ruma', 'Thanchi'],
                'Brahmanbaria' => ['Akhaura', 'Bancharampur', 'Bijoynagar', 'Brahmanbaria Sadar', 'Ashuganj', 'Kasba', 'Nabinagar', 'Nasirnagar', 'Sarail'],
                'Chandpur' => ['Chandpur Sadar', 'Faridganj', 'Haimchar', 'Hajiganj', 'Kachua', 'Matlob South', 'Matlob North', 'Shahrasti'],
                'Chittagong' => ['Anwara', 'Banshkhali', 'Boalkhali', 'Chandanaish', 'Fatikchhari', 'Hathazari', 'Lohagara', 'Mirsharai', 'Patiya', 'Rangunia', 'Raozan', 'Sandwip', 'Satkania', 'Sitakunda', 'Karnafuli'],
                'Comilla' => ['Barura', 'Brahmanpara', 'Burichang', 'Chandina', 'Chauddagram', 'Sadar South', 'Adarsha Sadar', 'Daudkandi', 'Debidwar', 'Homna', 'Laksam', 'Monohorganj', 'Meghna', 'Muradnagar', 'Nangalkot', 'Titas', 'Lalmai'],
                'Coxs Bazar' => ['Chakaria', 'Coxs Bazar Sadar', 'Kutubdia', 'Moheshkhali', 'Pekua', 'Ramu', 'Teknaf', 'Ukhia', 'Eidgaon'],
                'Feni' => ['Chhagalnaiya', 'Daganbhuiyan', 'Feni Sadar', 'Fulgazi', 'Parshuram', 'Sonagazi'],
                'Khagrachhari' => ['Dighinala', 'Manikchhari', 'Khagrachhari Sadar', 'Lakshmichhari', 'Mahalchhari', 'Matiranga', 'Panchhari', 'Ramgarh', 'Guimara'],
                'Lakshmipur' => ['Kamalnagar', 'Lakshmipur Sadar', 'Raipur', 'Ramganj', 'Ramgoti'],
                'Noakhali' => ['Begumganj', 'Chatkhil', 'Companiganj', 'Hatiya', 'Senbagh', 'Sonaimuri', 'Subarnachar', 'Noakhali Sadar', 'Kabirhat'],
                'Rangamati' => ['Baghaichhari', 'Barkal', 'Kawkhali', 'Kaptai', 'Juraichhari', 'Langadu', 'Naniarchar', 'Rangamati Sadar', 'Rajasthali', 'Belaichhari'],
            ],
            'Rajshahi' => [
                'Bogura' => ['Adamdighi', 'Bogura Sadar', 'Dhunat', 'Dupchanchia', 'Gabtali', 'Kahaloo', 'Nandigram', 'Sariakandi', 'Shajahanpur', 'Sherpur', 'Shibganj', 'Sonatala'],
                'Joypurhat' => ['Akkelpur', 'Joypurhat Sadar', 'Kalai', 'Panchbibi', 'Khetlal'],
                'Naogaon' => ['Atrai', 'Dhamoirhat', 'Manda', 'Mohadevpur', 'Naogaon Sadar', 'Niamatpur', 'Patnitala', 'Raninagar', 'Sapahar', 'Badalgachhi', 'Porsha'],
                'Natore' => ['Bagatipara', 'Baraigram', 'Gurudaspur', 'Lalpur', 'Natore Sadar', 'Singra', 'Naldanga'],
                'Chapainawabganj' => ['Shibganj', 'Bholahat', 'Gomastapur', 'Nachole', 'Chapainawabganj Sadar'],
                'Pabna' => ['Atgharia', 'Bera', 'Bhangura', 'Chatmohar', 'Faridpur', 'Ishwardi', 'Pabna Sadar', 'Santhia', 'Sujanagar'],
                'Rajshahi' => ['Bagha', 'Bagmara', 'Charghat', 'Durgapur', 'Godagari', 'Mohanpur', 'Paba', 'Puthia', 'Tanore'],
                'Sirajganj' => ['Belkuchi', 'Chauhali', 'Kamarkhanda', 'Kazipur', 'Raiganj', 'Shahjadpur', 'Sirajganj Sadar', 'Tarash', 'Ullahpara'],
            ],
            'Sylhet' => [
                'Habiganj' => ['Ajmeriganj', 'Bahubal', 'Baniyachong', 'Chunarughat', 'Habiganj Sadar', 'Lakhai', 'Madhabpur', 'Nabiganj', 'Shaistaganj'],
                'Moulvibazar' => ['Barlekha', 'Juri', 'Kamalganj', 'Kulaura', 'Moulvibazar Sadar', 'Rajnagar', 'Sreemangal'],
                'Sunamganj' => ['Bishwamandarpur', 'Chhatak', 'Derai', 'Dharampasha', 'Dowarabazar', 'Jagannathpur', 'Jamalganj', 'Shalla', 'Sunamganj Sadar', 'Tahirpur', 'Shantiganj', 'Madhyanagar'],
                'Sylhet' => ['Balaganj', 'Beanibazar', 'Bishwanath', 'Companiganj', 'South Surma', 'Fenchuganj', 'Golapganj', 'Gowainghat', 'Jaintiapur', 'Kanaighat', 'Sylhet Sadar', 'Jakiganj', 'Osmaninagar'],
            ],
            'Rongpur' => [
                'Dinajpur' => ['Birampur', 'Birganj', 'Birol', 'Bochaganj', 'Chirirbandar', 'Phulbari', 'Ghoraghat', 'Hakimpur', 'Kaharole', 'Khansama', 'Nawabganj', 'Parbatipur', 'Dinajpur Sadar'],
                'Gaibandha' => ['Fulchhari', 'Gaibandha Sadar', 'Gobindaganj', 'Palashbari', 'Sadullapur', 'Saghata', 'Sundarganj'],
                'Kurigram' => ['Phulbari', 'Bhurungamari', 'Char Rajibpur', 'Chilmari', 'Kurigram Sadar', 'Nageshwari', 'Rajarhat', 'Roumari', 'Ulipur'],
                'Lalmonirhat' => ['Aditmari', 'Hatibandha', 'Kaliganj', 'Lalmonirhat Sadar', 'Patgram'],
                'Nilphamari' => ['Domar', 'Jaldhaka', 'Kishoreganj', 'Nilphamari Sadar', 'Saidpur', 'Dimla'],
                'Panchagarh' => ['Atwari', 'Boda', 'Debiganj', 'Panchagarh Sadar', 'Tetulia'],
                'Rangpur' => ['Badarganj', 'Kaunia', 'Rangpur Sadar', 'Mithapukur', 'Pirgachha', 'Pirganj', 'Taraganj', 'Gangachara'],
                'Thakurgaon' => ['Pirganj', 'Baliadangi', 'Haripur', 'Ranisankail', 'Thakurgaon Sadar'],
            ],
            'Mymensingh' => [
                'Jamalpur' => ['Bakshiganj', 'Dewanganj', 'Isampur', 'Jamalpur Sadar', 'Madarganj', 'Melandaha', 'Sarishabari'],
                'Mymensingh' => ['Valuka', 'Dhobaura', 'Fulbaria', 'Gaffargaon', 'Gouripur', 'Haluaghat', 'Ishwarganj', 'Mymensingh Sadar', 'Muktagachha', 'Nandail', 'Phulpur', 'Tarakanda', 'Trishal'],
                'Netrokona' => ['Atpara', 'Barhatta', 'Durgapur', 'Khaliajuri', 'Kalmakanda', 'Kendua', 'Madan', 'Mohanganj', 'Netrokona Sadar', 'Purbadhala'],
                'Sherpur' => ['Jhenaigati', 'Nakla', 'Nalitabari', 'Sherpur Sadar', 'Sreebardi'],
            ],
            'Barisal' => [
                'Jhalokati' => ['Jhalokati Sadar', 'Nalchity', 'Kathalia', 'Rajapur'],
                'Barguna' => ['Amtali', 'Bamna', 'Barguna Sadar', 'Betagi', 'Patharghata', 'Taltali'],
                'Barisal' => ['Agailjhara', 'Babuganj', 'Bakerganj', 'Banaripara', 'Gournadi', 'Hijla', 'Barisal Sadar', 'Mehendiganj', 'Muladi', 'Wazirpur'],
                'Bhola' => ['Bhola Sadar', 'Burhanuddin', 'Daulatkhan', 'Lalmohan', 'Monpura', 'Tazumuddin', 'Char Fasson'],
                'Patuakhali' => ['Bauphal', 'Dashmina', 'Dumki', 'Kalapara', 'Mirzaganj', 'Patuakhali Sadar', 'Rangabali', 'Galachipa'],
                'Pirojpur' => ['Bhandaria', 'Kawkhali', 'Mathbaria', 'Nazirpur', 'Pirojpur Sadar', 'Nesarabad', 'Zianagar'],
            ]
        ];

        foreach ($locations as $divName => $districts) {
            $division = Division::create(['name' => $divName]);

            foreach ($districts as $distName => $upazilas) {
                $district = District::create([
                    'division_id' => $division->id,
                    'name' => $distName
                ]);

                foreach ($upazilas as $upName) {
                    Upazila::create([
                        'district_id' => $district->id,
                        'name' => $upName
                    ]);
                }
            }
        }
    }
}