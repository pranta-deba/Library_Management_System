<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
};

if (isset($_POST['Send'])) {
    //database conn
    require "Include/databaseConn.php";
    // form value to set valiable
    $your_name = $conn->escape_string($_POST['your_name']);
    $your_surname = $conn->escape_string($_POST['your_surname']);
    $your_email = $conn->escape_string($_POST['your_email']);
    $your_subject = $conn->escape_string($_POST['your_subject']);
    $your_message = $conn->escape_string($_POST['your_message']);

    $queary = "INSERT INTO contacts values(null,
    '" . $your_name . "',
    '" . $your_surname . "',
    '" . $your_email . "',
    '" . $your_subject . "',
    '" . $your_message . "',
    null)";

    $conn->query($queary);
    if ($conn->affected_rows) {
        echo '<script>alert(" Hey, '.$your_name.' . Your Massage Send Successfully.");</script>';
    };
};

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="stylesheet" href="Assets/Css/bootstrap.min.css">
    <link rel="stylesheet" href="Assets/Css/style.css">

</head>

<body>

    <!-- navbar -->
    <?php include "Templete/navbar.php"; ?>
    <!-- navbar -->

    <div class="container p-3">

        <div class="row">
            <div class="col-md-12 col-lg-6">
                <div class="container my-5">
                    <div class="row justify-content-center">
                        <div class="col-lg-9">
                            <h1 class="mb-3">Contact Us</h1>
                            <form method="post">
                                <div class="row g-3">
                                    <div class="col-md-6">
                                        <label for="your-name" class="form-label">Your Name</label>
                                        <input type="text" class="form-control" id="your-name" name="your_name" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="your-surname" class="form-label">Your Surname</label>
                                        <input type="text" class="form-control" id="your-surname" name="your_surname" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="your-email" class="form-label">Your Email</label>
                                        <input type="email" class="form-control" id="your-email" name="your_email" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="your-subject" class="form-label">Your Subject</label>
                                        <input type="text" class="form-control" id="your-subject" name="your_subject">
                                    </div>
                                    <div class="col-12">
                                        <label for="your-message" class="form-label">Your Message</label>
                                        <textarea class="form-control" id="your_message" name="your_message" rows="5" required></textarea>
                                    </div>
                                    <div class="col-12">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <button type="submit" class="btn btn-danger w-100 fw-bold" name="Send">Send</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12 col-lg-6">
                <div class="container my-5">
                    <h2>Digital Library</h2>
                    <p> A library is a collection of books, and possibly other materials and media, that is accessible for use by its members and members of allied institutions. Libraries provide physical (hard copies) or digital access (soft copies) materials, and may be a physical location or a virtual space, or both. A library's collection normally includes printed materials which can be borrowed, and a reference section of publications which are not permitted to leave the library and can only be viewed inside the premises. There may be other physical resources in many formats, such as commercial releases of films, television programmes, other video recordings, radio, music and audio recordings on DVD, Blu-ray, CD and cassette, besides access to information, music or other content held on bibliographic databases.
                    </p>
                    <p>Libraries can vary widely in size and may be organised and maintained by a public body such as a government, an institution such as a school or museum, a corporation, or a private individual. In addition to providing materials, libraries also provide the services of librarians who are trained experts in finding, selecting, circulating and organising information, and in interpreting information needs, navigating and analysing very large amounts of information with a variety of resources.</p>
                </div>
            </div>
        </div>
        <p>Library buildings often provide quiet areas for studying, as well as common areas for group study and collaboration, and may provide public facilities for access to their electronic resources, such as computers and access to the Internet. The library's clientele and services offered vary depending on its type: users of a public library have different needs from those of a special library or academic library, for example. Libraries may also be community hubs, where programmes are made available and people engage in lifelong learning. Modern libraries extend their services beyond the physical walls of the building by providing material accessible by electronic means, including from home via the Internet.</p>
        <p>The services that libraries offer are variously described as library services, information services, or the combination "library and information services", although different institutions and sources define such terminology differently.</p>


        <h2>Etymology</h2>
        <p> The term library is based on the Latin word liber for 'book' or 'document', contained in Latin libraria 'collection of books' and librarium 'container for books'. Other modern languages use derivations from Ancient Greek βιβλιοθήκη (bibliothēkē), originally meaning 'book container', via Latin bibliotheca (cf. French bibliothèque or German Bibliothek).
        </p>
        <h2>History</h2>
        <p> The history of libraries began with the first efforts to organize collections of documents. The first libraries consisted of archives of the earliest form of writing—the clay tablets in cuneiform script discovered in Sumer, some dating back to 2600 BC. Private or personal libraries made up of written books appeared in classical Greece in the 5th century BC. In the 6th century, at the very close of the Classical period, the great libraries of the Mediterranean world remained those of Constantinople and Alexandria.

            The Fatimids (r. 909–1171) also possessed many great libraries within their domains. The historian Ibn Abi Tayyi’ describes their palace library, which probably contained the largest collection of literature on earth at the time, as a "wonder of the world". Throughout history, along with bloody massacres, the destruction of libraries has been critical for conquerors who wish to destroy every trace of the vanquished community's recorded memory. A prominent example of this can be found in the Mongol massacre of the Nizaris at Alamut in 1256 and the torching of their library, "the fame of which", boasts the conqueror Juwayni, "had spread throughout the world".

            The libraries of Timbuktu were established in the fourteenth century and attracted scholars from all over the world.
        </p>


        <h2>Academic libraries</h2>
        <p> Crispy Fhres built the Drag Racing Lights app as a Commercial app. This SERVICE is provided by
            Crispy Fhres and is intended for use as isAcademic libraries are generally located on college and university campuses and primarily serve the students and faculty of that and other academic institutions. Some academic libraries, especially those at public institutions, are accessible to members of the general public in whole or in part. Library services are sometimes extended to the general public at a fee; some academic libraries create such services in order to enhance literacy levels in their communities.
            <br>
            Academic libraries are libraries that are hosted in post-secondary educational institutions, such as colleges and universities. Their main functions are to provide support in research, consultancy and resource linkage for students and faculty of the educational institution. Academic libraries house current, reliable and relevant information resources spread through all the disciplines which serve to assuage the information requirements of students and faculty. In cases where not all books are housed some libraries have E-resources, where they subscribe for a given institution they are serving, in order to provide backups and additional information that is not practical to have available as hard copies. Furthermore, most libraries collaborate with other libraries in exchange of books.
        </p>


        <h2>Privacy Policy</h2>
        <p> Crispy Fhres built the Drag Racing Lights app as a Commercial app. This SERVICE is provided by
            Crispy Fhres and is intended for use as is.
        </p>
        <p>This page is used to inform visitors regarding my policies with the collection, use, and disclosure
            of Personal Information if anyone decided to use my Service.
        </p>
        <p>If you choose to use my Service, then you agree to the collection and use of information in
            relation to this policy. The Personal Information that I collect is used for providing and improving
            the Service. I will not use or share your information with anyone except as described
            in this Privacy Policy.
        </p>
        <p>The terms used in this Privacy Policy have the same meanings as in our Terms and Conditions, which is
            accessible at Drag Racing Lights unless otherwise defined in this Privacy Policy.
        </p>
        <p><strong>Information Collection and Use</strong></p>
        <p>For a better experience, while using our Service, I may require you to provide us with certain
            personally identifiable information. The information that I request will be retained on your device and is not collected by me in any way.
        </p>
        <p>The app does use third party services that may collect information used to identify you.</p>
        <div>
            <p>Link to privacy policy of third party service providers used by the app</p>
            <ul>
                <li><a href="https://policies.google.com/privacy" target="_blank">Google Play Services</a></li>
            </ul>
        </div>
        <p><strong>Service Providers</strong></p>
        <p> I may employ third-party companies and individuals due to the following reasons:</p>
        <ul>
            <li>To facilitate our Service;</li>
            <li>To provide the Service on our behalf;</li>
            <li>To perform Service-related services; or</li>
            <li>To assist us in analyzing how our Service is used.</li>
        </ul>
        <p> I want to inform users of this Service that these third parties have access to
            your Personal Information. The reason is to perform the tasks assigned to them on our behalf. However,
            they are obligated not to disclose or use the information for any other purpose.
        </p>
        <p><strong>Security</strong></p>
        <p> I value your trust in providing us your Personal Information, thus we are striving
            to use commercially acceptable means of protecting it. But remember that no method of transmission over
            the internet, or method of electronic storage is 100% secure and reliable, and I cannot guarantee
            its absolute security.
        </p>
        <p><strong>Links to Other Sites</strong></p>
        <p>This Service may contain links to other sites. If you click on a third-party link, you will be directed
            to that site. Note that these external sites are not operated by me. Therefore, I strongly
            advise you to review the Privacy Policy of these websites. I have no control over
            and assume no responsibility for the content, privacy policies, or practices of any third-party sites
            or services.
        </p>

        <p><strong>Changes to This Privacy Policy</strong></p>
        <p> I may update our Privacy Policy from time to time. Thus, you are advised to review
            this page periodically for any changes. I will notify you of any changes by posting
            the new Privacy Policy on this page. These changes are effective immediately after they are posted on
            this page.
        </p>
        <p><strong>Contact Us</strong></p>
        <p>If you have any questions or suggestions about my Privacy Policy, do not hesitate to contact
            me.
        </p>
        <p>This privacy policy page was created at <a href="javascript:void(0);">privacypolicytemplate.net</a>
            and modified/generated by <a href="javascript:void(0);">App
                Privacy Policy Generator</a></p>


    </div>

    <!-- footer -->
    <?php include "Templete/footer.php"; ?>
    <!-- footer -->

    <script src="Assets/Js/code.jquery.com_jquery-3.7.1.min.js"></script>
    <script src="Assets/Js/bootstrap.bundle.min.js"></script>
    <script src="Assets/Js/emtrysearch.js"></script>

</body>

</html>